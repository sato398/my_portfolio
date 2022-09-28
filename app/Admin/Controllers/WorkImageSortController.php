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
        $workId = request()->route('work');

        $works = Work::whereId($workId)->with('workImages')->get();

        return Admin::content(function (Content $content) use ($works, $workId) {
            $content->header('画像の並び順/' . $works->first()->title);
            $content->body(WorkImage::tree(function ($tree) use ($works, $workId) {
                $tree->query(function ($query) use ($workId) {
                    $query = $query::where('work_id', $workId);
                    return $query;
                });
                $tree->disableCreate();
                $tree->branch(function ($branch) use ($works) {
                    $src = '/storage' . $branch['path'];
                    $logo = "<img src='$src' style='max-width:100px;max-height:100px' class='img'/>";
                    $work = $works->first()->title;
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
