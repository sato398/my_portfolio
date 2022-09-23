<?php

namespace App\Admin\Controllers;

use App\Models\BasePosition;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\BaseTool;

class BasePositionSortController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('スキルの並び順');
            $content->body(BasePosition::tree(function ($tree) {
                $tree->disableCreate();
                $tree->branch(function ($branch) {
                    $name = $branch['name'];
                    return "担当名：{$name}";
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
        return Admin::form(BasePosition::class, function (Form $form) {
        });
    }
}
