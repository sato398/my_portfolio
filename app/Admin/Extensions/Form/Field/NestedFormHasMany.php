<?php

namespace App\Admin\Extensions\Form\Field;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Encore\Admin\Form\Field;
use Encore\Admin\Form\NestedForm;
use Encore\Admin\Widgets\Form as WidgetForm;
use Illuminate\Database\Eloquent\Relations\HasMany as Relation;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Encore\Admin\Form\Field\HasMany as HasManyOrigin;
use App\Models\WorkTool;

/**
 * Class HasMany.
 */
class NestedFormHasMany extends HasManyOrigin
{
    /**
     * Build a Nested form.
     *
     * @param string   $column
     * @param \Closure $builder
     * @param null     $model
     *
     * @return NestedForm
     */
    protected function buildNestedForm($column, \Closure $builder, $model = null)
    {
        $form = app()->make(Form\NestedForm::class,['relation' => $column, 'model' => $model]);

        if ($this->form instanceof WidgetForm) {
            $form->setWidgetForm($this->form);
        } else {
            $form->setForm($this->form);
        }

        call_user_func($builder, $form);

        $form->hidden($this->getKeyName());

        $form->hidden(NestedForm::REMOVE_FLAG_NAME)->default(0)->addElementClass(NestedForm::REMOVE_FLAG_CLASS);

        return $form;
    }

    /**
     * Build Nested form for related data.
     *
     * @throws \Exception
     *
     * @return array
     */
    protected function buildRelatedForms()
    {
        if (is_null($this->form)) {
            return [];
        }

        // $model = $this->form->model();
        $model = new WorkTool();

        $relation = call_user_func([$model, $this->relationName]);

        if (!$relation instanceof Relation && !$relation instanceof MorphMany) {
            throw new \Exception('hasMany field must be a HasMany or MorphMany relation.');
        }

        $forms = [];

        /*
         * If redirect from `exception` or `validation error` page.
         *
         * Then get form data from session flash.
         *
         * Else get data from database.
         */
        if ($values = old($this->column)) {
            foreach ($values as $key => $data) {
                if ($data[NestedForm::REMOVE_FLAG_NAME] == 1) {
                    continue;
                }

                $model = $relation->getRelated()->replicate()->forceFill($data);

                $forms[$key] = $this->buildNestedForm($this->column, $this->builder, $model)
                    ->fill($data);
            }
        } else {
            if (empty($this->value)) {
                return [];
            }

            foreach ($this->value as $data) {
                $key = Arr::get($data, $relation->getRelated()->getKeyName());

                $model = $relation->getRelated()->replicate()->forceFill($data);

                $forms[$key] = $this->buildNestedForm($this->column, $this->builder, $model)
                    ->fill($data);
            }
        }

        return $forms;
    }

    /**
     * Get the HasMany relation key name.
     *
     * @return string
     */
    protected function getKeyName()
    {
        if (is_null($this->form)) {
            return;
        }

        // return $this->form->model()->{$this->relationName}()->getRelated()->getKeyName();
        $model = new WorkTool();
        return $model->{$this->relationName}()->getRelated()->getKeyName();
    }

    /**
     * Setup default template script.
     *
     * @param string $templateScript
     *
     * @return void
     */
    protected function setupScriptForDefaultView($templateScript)
    {
        $removeClass = NestedForm::REMOVE_FLAG_CLASS;
        $defaultKey = NestedForm::DEFAULT_KEY_NAME;

        /**
         * When add a new sub form, replace all element key in new sub form.
         *
         * @example comments[new___key__][title]  => comments[new_{index}][title]
         *
         * {count} is increment number of current sub form count.
         */
        $script = <<<EOT
var index = 0;
$('#has-many-{$this->column}').off('click', '.add').on('click', '.add', function () {

    var tpl = $('template.{$this->column}-tpl');

    index++;

    var template = tpl.html().replace(/{$defaultKey}/g, index);
    $('.has-many-{$this->column}-forms').append(template);
    {$templateScript}
    return false;
});

$('#has-many-{$this->column}').off('click', '.remove').on('click', '.remove', function () {
    $(this).closest('.has-many-{$this->column}-form').find('input').removeAttr('required');
    $(this).closest('.has-many-{$this->column}-form').hide();
    $(this).closest('.has-many-{$this->column}-form').find('.$removeClass').val(1);
    return false;
});

EOT;

        Admin::script($script);
    }

    /**
     * Setup tab template script.
     *
     * @param string $templateScript
     *
     * @return void
     */
    protected function setupScriptForTabView($templateScript)
    {
        $removeClass = NestedForm::REMOVE_FLAG_CLASS;
        $defaultKey = NestedForm::DEFAULT_KEY_NAME;

        $script = <<<EOT

$('#has-many-{$this->column} > .nav').off('click', 'i.close-tab').on('click', 'i.close-tab', function(){
    var \$navTab = $(this).siblings('a');
    var \$pane = $(\$navTab.attr('href'));
    if( \$pane.hasClass('new') ){
        \$pane.remove();
    }else{
        \$pane.removeClass('active').find('.$removeClass').val(1);
    }
    if(\$navTab.closest('li').hasClass('active')){
        \$navTab.closest('li').remove();
        $('#has-many-{$this->column} > .nav > li:nth-child(1) > a').tab('show');
    }else{
        \$navTab.closest('li').remove();
    }
});

var index = 0;
$('#has-many-{$this->column} > .header').off('click', '.add').on('click', '.add', function(){
    index++;
    var navTabHtml = $('#has-many-{$this->column} > template.nav-tab-tpl').html().replace(/{$defaultKey}/g, index);
    var paneHtml = $('#has-many-{$this->column} > template.pane-tpl').html().replace(/{$defaultKey}/g, index);
    $('#has-many-{$this->column} > .nav').append(navTabHtml);
    $('#has-many-{$this->column} > .tab-content').append(paneHtml);
    $('#has-many-{$this->column} > .nav > li:last-child a').tab('show');
    {$templateScript}
});

if ($('.has-error').length) {
    $('.has-error').parent('.tab-pane').each(function () {
        var tabId = '#'+$(this).attr('id');
        $('li a[href="'+tabId+'"] i').removeClass('hide');
    });

    var first = $('.has-error:first').parent().attr('id');
    $('li a[href="#'+first+'"]').tab('show');
}
EOT;

        Admin::script($script);
    }

    /**
     * Setup default template script.
     *
     * @param string $templateScript
     *
     * @return void
     */
    protected function setupScriptForTableView($templateScript)
    {
        $removeClass = NestedForm::REMOVE_FLAG_CLASS;
        $defaultKey = NestedForm::DEFAULT_KEY_NAME;

        /**
         * When add a new sub form, replace all element key in new sub form.
         *
         * @example comments[new___key__][title]  => comments[new_{index}][title]
         *
         * {count} is increment number of current sub form count.
         */
        $script = <<<EOT
var index = 0;
$('#has-many-{$this->column}').on('click', '.add', function () {

    var tpl = $('template.{$this->column}-tpl');

    index++;

    var template = tpl.html().replace(/{$defaultKey}/g, index);
    $('.has-many-{$this->column}-forms').append(template);
    {$templateScript}
    return false;
});

$('#has-many-{$this->column}').on('click', '.remove', function () {
    var first_input_name = $(this).closest('.has-many-{$this->column}-form').find('input[name]:first').attr('name');
    if (first_input_name.match('{$this->column}\\\[new_')) {
        $(this).closest('.has-many-{$this->column}-form').remove();
    } else {
        $(this).closest('.has-many-{$this->column}-form').hide();
        $(this).closest('.has-many-{$this->column}-form').find('.$removeClass').val(1);
        $(this).closest('.has-many-{$this->column}-form').find('input').removeAttr('required');
    }
    return false;
});

EOT;

        Admin::script($script);
    }
}
