<?php

namespace App\Admin\Selectable;

use App\Models\BaseTool;
use App\Models\BaseToolCategory;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;
use Carbon\Carbon;

class BaseTools extends Selectable
{
    public $model = BaseTool::class;

    public function make()
    {
        $baseToolCatogories = BaseToolCategory::all();
        // $this->column('id', __('Id'));
        $this->column('name', 'ツール名');
        $this->column('slug', 'スラッグ');
        $this->column('base_tool_category_id', 'カテゴリー')->display(function() use($baseToolCatogories){
            return $baseToolCatogories->where('id', $this->base_tool_category_id)->first()->name;
        });
        // $this->column('sort', 'ソート番号');
        // // $this->column('parent_id', __('Parent id'));
        // $this->column('created_at', '作成日時')->display(function () {
        //     return Carbon::parse($this->created_at)->format('Y/m/d H:i:s');
        // })->sortable();
        // $this->column('updated_at', '更新日時')->display(function () {
        //     return Carbon::parse($this->updated_at)->format('Y/m/d H:i:s');
        // })->sortable();

        // $this->filter(function (Filter $filter) {
        //     $filter->like('name');
        // });
    }
}
