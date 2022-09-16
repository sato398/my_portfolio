<?php

namespace App\Admin\Controllers;

use App\Models\BaseToolVersion;

use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\BaseTool;


class BaseToolVersionSortController extends Controller
{
    use ModelForm;

    public function index()
    {
        $baseTools = BaseTool::all();

        return Admin::content(function (Content $content) use($baseTools){
            $content->header('スキルの並び順');
            $content->body(BaseToolVersion::tree(function ($tree) use($baseTools){
                $tree->disableCreate();
                $tree->branch(function ($branch) use($baseTools){
                    $version = $branch['version'];
                    $name = $baseTools->where('id', $branch['base_tool_id'])->first()->name;
                    return "ツール名：{$name} / バージョン：{$version}";
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
        return Admin::form(BaseToolVersion::class, function (Form $form) {

        });
    }
}
