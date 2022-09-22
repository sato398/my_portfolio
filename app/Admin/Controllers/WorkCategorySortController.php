<?php

namespace App\Admin\Controllers;

use App\Models\WorkCategory;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\BaseToolCategory;

class WorkCategorySortController extends Controller
{
    use ModelForm;

    public function index()
    {
        // $baseTools = BaseToolCategory::all();

        return Admin::content(function (Content $content) {
            $content->header('ワークカテゴリーの並び順');
            $content->body(WorkCategory::tree(function ($tree) {
                $tree->disableCreate();
                $tree->branch(function ($branch) {
                    $name = $branch['name'];
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
        return Admin::form(Work::class, function (Form $form) {
        });
    }
}
