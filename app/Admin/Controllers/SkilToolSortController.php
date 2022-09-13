<?php

namespace App\Admin\Controllers;

use App\Models\SkilTool;

use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\BaseTool;


class SkilToolSortController extends Controller
{
    use ModelForm;

    public function index()
    {
        $baseTools = BaseTool::with('baseToolCategory')->get();

        return Admin::content(function (Content $content) use($baseTools){
            $content->header('スキルの並び順');
            $content->body(SkilTool::tree(function ($tree) use($baseTools){
                $tree->disableCreate();
                $tree->branch(function ($branch) use($baseTools){
                    $category = $baseTools->where('id', $branch['base_tool_id'])->first()->baseToolCategory->name;
                    $name = $baseTools->where('id', $branch['base_tool_id'])->first()->name;
                    return "カテゴリー名：{$category} / ツール名：{$name}";
                });
            }));
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(SkilTool::class, function (Form $form) {

        });
    }
}
