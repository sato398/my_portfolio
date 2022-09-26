<?php

namespace App\Admin\Controllers;

use App\Models\Work;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\BaseToolCategory;
use App\Models\WorkCategory;

class WorkSortController extends Controller
{
    use ModelForm;

    public function index()
    {
        $works = Work::with('workCategory')->get();

        return Admin::content(function (Content $content) use ($works) {
            $content->header('実績の並び順');
            $content->body(Work::tree(function ($tree) use ($works) {
                $tree->disableCreate();
                $tree->branch(function ($branch) use ($works) {
                    $category = $works->where('work_category_id', $branch['work_category_id'])->first()->workCategory->name;
                    $name = $branch['title'];
                    return "カテゴリー：{$category} / タイトル：{$name}";
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
            //
        });
    }
}
