<?php

namespace App\Admin\Controllers;

use App\Models\Skil;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\BaseToolCategory;
use App\Models\SkilTool;

class SkilSortController extends Controller
{
    use ModelForm;

    public function index()
    {
        $baseTools = BaseToolCategory::all();

        return Admin::content(function (Content $content) use ($baseTools) {
            $content->header('スキルカテゴリーの並び順');
            $content->body(Skil::tree(function ($tree) use ($baseTools) {
                $tree->disableCreate();
                $tree->branch(function ($branch) use ($baseTools) {
                    $name = $baseTools->where('id', $branch['base_tool_category_id'])->first()->name;
                    return "カテゴリー名：{$name}";
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
        return Admin::form(Skil::class, function (Form $form) {
        });
    }
}
