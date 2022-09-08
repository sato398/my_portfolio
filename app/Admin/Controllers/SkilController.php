<?php

namespace App\Admin\Controllers;

use App\Models\Skil;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;

use App\Models\BaseToolCategory;
use App\Models\BaseTool;

class SkilController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Skil';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Skil());

        // $grid->column('id', __('Id'));
        $grid->column('base_category_id', 'カテゴリー名');
        $grid->column('years_of_dev', '開発年数');
        $grid->column('created_at', '作成日時')->display(function () {
            return Carbon::parse($this->created_at)->format('Y/m/d H:i:s');
        })->sortable();
        $grid->column('updated_at', '更新日時')->display(function () {
            return Carbon::parse($this->updated_at)->format('Y/m/d H:i:s');
        })->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Skil::findOrFail($id));

        // $show->field('id', __('Id'));
        $show->field('base_category_id', 'カテゴリー名');
        $show->field('years_of_dev', '開発年数');
        // $show->field('parent_id', __('Parent id'));
        $show->field('created_at', '作成日時')->as(function ($createdAt) {
            return Carbon::parse($createdAt)->format('Y/m/d H:i:s');
        });
        $show->field('updated_at', '更新日時')->as(function ($updatedAt) {
            return Carbon::parse($updatedAt)->format('Y/m/d H:i:s');
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Skil());

        $form->select('base_category_id', 'カテゴリー名')
        ->options(
            BaseToolCategory::orderBy('sort', 'asc')->get()
            ->pluck('name', 'id')
        )->rules('required|exists:App\Models\BaseToolCategory,id');
        $form->hasMany('tools', 'ツール', function(Form\NestedForm $toolsForm) use($form){
            $toolsForm->select('base_tool_id', 'ツール名')
            ->options(
                  BaseTool::orderBy('sort', 'asc')->get()
                ->pluck('name', 'id')
            )->rules('required|exists:App\Models\BaseTool,id');
            $toolsForm->text('years_of_dev', '開発年数');
            $toolsForm->text('icon', 'アイコン');

            // $toolsForm->saving(function($toolsForm) use($form){
            //     $id = $form->input('id');
            //     $toolsForm->skil_id = $id;
            // });
        })->useTable();

        return $form;
    }
}
