<?php

namespace App\Admin\Controllers;

use App\Models\WorkCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;

class WorkCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'WorkCategory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WorkCategory());

        // $grid->column('id', __('Id'));
        $grid->column('name', 'カテゴリー名');
        $grid->column('slug', 'スラッグ');
        $grid->column('sort', 'ソート順');
        // $grid->column('parent_id', __('Parent id'));
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
        $show = new Show(WorkCategory::findOrFail($id));

        // $show->field('id', __('Id'));
        $show->field('name', 'カテゴリー名');
        $show->field('slug', 'スラッグ');
        $show->field('sort', 'ソート順');
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
        $form = new Form(new WorkCategory());

        $form->text('name', 'カテゴリー名');
        $form->text('slug', 'スラッグ');
        // $form->number('sort', __('Sort'));
        // $form->number('parent_id', __('Parent id'));

        return $form;
    }
}
