<?php

namespace App\Admin\Controllers;

use App\Models\BaseTool;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;

use App\Models\BaseToolCategory;

class BaseToolController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ベースツール';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BaseTool());

        // $grid->column('id', __('Id'));
        $grid->column('name', 'ツール名');
        $grid->column('base_tool_category_id', 'カテゴリー');
        $grid->column('sort', 'ソート番号');
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
        $show = new Show(BaseTool::findOrFail($id));

        // $show->field('id', __('Id'));
        $show->field('name', 'ツール名');
        $show->field('base_tool_category_id', 'カテゴリー名');
        $show->field('sort', 'ソート番号');
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
        $form = new Form(new BaseTool());

        $form->select('base_tool_category_id', 'カテゴリー')
        ->options(
            BaseToolCategory::orderBy('sort', 'asc')->get()
            ->pluck('name', 'id')
        )->rules('required|exists:App\Models\BaseToolCategory,id');
        $form->text('name', 'ツール名');

        // $form->number('sort', __('Sort'));
        // $form->number('parent_id', __('Parent id'));

        return $form;
    }
}
