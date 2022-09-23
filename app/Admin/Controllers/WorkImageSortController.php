<?php

namespace App\Admin\Controllers;

use App\Models\WorkImage;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Work;

class WorkImageSortController extends Controller
{
    use ModelForm;

    public function index()
    {
        $works = Work::with('workImages')->get();

        return Admin::content(function (Content $content) use ($works) {
            $content->header('画像の並び順');
            $content->body(WorkImage::tree(function ($tree) use ($works) {
                $tree->disableCreate();
                $tree->branch(function ($branch) use ($works) {
                    $src = '/storage' . $branch['path'];
                    $logo = "<img src='$src' style='max-width:100px;max-height:100px' class='img'/>";
                    $work = $works->where('id', $branch['work_id'])->first()->title;
                    return "ワークタイトル：{$work}  / 画像：{$logo}";
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
        return Admin::form(WorkImage::class, function (Form $form) {
        });
    }
}
