<?php

namespace App\Admin\Controllers;

use App\Models\Work;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;

use App\Models\WorkCategory;

class WorkController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Work';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Work());

        // $grid->column('id', __('Id'));
        $grid->column('title', 'タイトル');
        $grid->column('slug', 'スラッグ');
        $grid->column('work_category_id', 'カテゴリー');
        $grid->column('explanation', '説明');
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
        $show = new Show(Work::findOrFail($id));

        // $show->field('id', __('Id'));
        $show->field('title', 'タイトル');
        $show->field('slug', 'スラッグ');
        $show->field('work_category_id', 'カテゴリー');
        $show->field('explanation', '説明');
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
        $form = new Form(new Work());

        $form->text('title', 'タイトル');
        $form->text('slug', 'スラッグ');
        $form->select('work_category_id', 'カテゴリー')
        ->options(
            WorkCategory::orderBy('sort', 'asc')->get()
            ->pluck('name', 'id')
        )->rules('required|exists:App\Models\WorkCategory,id');
        $form->ckeditor('explanation', '説明');

        return $form;
    }
}
