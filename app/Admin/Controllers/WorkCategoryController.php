<?php

namespace App\Admin\Controllers;

use App\Models\WorkCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;
use Illuminate\Support\Str;

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

        $grid->model()->orderBy('sort', 'asc');

        $grid->column('name', 'カテゴリー名');
        $grid->column('name_en', 'カテゴリー名(英語)');
        $grid->column('slug', 'スラッグ');
        $grid->column('sort', 'ソート順')->sortable();
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

        $show->field('name', 'カテゴリー名');
        $show->field('name_en', 'カテゴリー名(英語)');
        $show->field('slug', 'スラッグ');
        $show->field('sort', 'ソート順');
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

        $form->text('name', 'カテゴリー名')->rules('required');
        $form->text('name_en', 'カテゴリー名(英語)')->rules('required');
        $form->text('slug', 'スラッグ')->rules('required');

        $form->confirm('本当に登録しますか？', 'create');
        $form->confirm('本当に変更しますか？', 'edit');

        $form->saving(function ($form) {
            $slug = $form->input('slug');
            $slug = str_replace(' ', '-', $slug);
            $slug = Str::lower($slug);
            $form->input('slug', $slug);
        });

        return $form;
    }
}
