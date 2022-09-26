<?php

namespace App\Admin\Controllers;

use App\Models\WorkImage;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Work;
use Encore\Admin\Grid;

class WorkImageSortSelectController extends Controller
{
    use ModelForm;

    public function index()
    {
        // $workId = request()->route('work');

        $works = Work::with('workImages')->get();
        $contents = '';
        $contents .= '<div class="box">';
        $contents .= '<div class="box-body table-responsive no-padding">';
        $contents .= '<div class="dd">';
        $contents .= '<ol class="dd-list">';
        foreach ($works as $key => $work) {
            $contents .= '<li class="dd-item">';
            $contents .= '<a href="' . $work->id . '/work-image-sort">';
            $contents .= '<div class="dd-handle">';
            $contents .= $work->title;
            $contents .= '</div>';
            $contents .= '</a>';
            $contents .= '</li>';
        }
        $contents .= '</ol>';
        $contents .= '</div>';
        $contents .= '</div>';
        $contents .= '</div>';

        return Admin::content(function (Content $content) use ($works, $contents) {
            $content->header('画像の並び順');
            $content->body($contents);
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
