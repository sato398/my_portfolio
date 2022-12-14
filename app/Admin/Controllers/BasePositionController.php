<?php

namespace App\Admin\Controllers;

use App\Models\BasePosition;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BasePositionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BasePosition';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BasePosition());

        $grid->model()->orderBy('sort', 'asc');

        // $grid->column('id', __('Id'));
        $grid->column('name', '担当範囲名');
        $grid->column('sort', 'ソート順')->sortable();
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
        $show = new Show(BasePosition::findOrFail($id));

        // $show->field('id', __('Id'));
        $show->field('name', '担当範囲名');
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
        $form = new Form(new BasePosition());

        $form->text('name', '担当範囲名')->rules('required');
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
