<?php

namespace App\Admin\Controllers;

use App\Models\Work;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\BaseTool;
use App\Models\BasePosition;
use Illuminate\Support\Facades\Storage;

use App\Models\WorkCategory;

class WorkController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Work';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Work());

        // $grid->column('id', __('Id'));
        $grid->column('title', 'タイトル');
        $grid->column('slug', 'スラッグ');
        $grid->workCategory()->name('カテゴリー名');
        // $grid->column('explanation', '説明');
        $grid->column('created_at', '作成日時')->display(function () {
            return Carbon::parse($this->created_at)->format('Y/m/d H:i:s');
        })->sortable();
        $grid->column('updated_at', '更新日時')->display(function () {
            return Carbon::parse($this->updated_at)->format('Y/m/d H:i:s');
        })->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Work::findOrFail($id));

        // $show->field('id', __('Id'));
        $show->field('title', 'タイトル');
        $show->field('slug', 'スラッグ');
        // $show->field('work_category_id', 'カテゴリー');
        $show->relation('workCategory', 'カテゴリー', 'カテゴリー');
        $show->field('explanation', '説明')->as(function ($content) {
            return "{$content}";
        });
        $show->field('created_at', '作成日時')->as(function ($createdAt) {
            return Carbon::parse($createdAt)->format('Y/m/d H:i:s');
        });
        $show->field('updated_at', '更新日時')->as(function ($updatedAt) {
            return Carbon::parse($updatedAt)->format('Y/m/d H:i:s');
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Work());

        $form->text('title', 'タイトル');
        $form->text('slug', 'スラッグ');
        $form->select('work_category_id', 'カテゴリー')
        ->options(
            WorkCategory::orderBy('sort', 'asc')->get()
            ->pluck('name', 'id')
        )->rules('required|exists:App\Models\WorkCategory,id');
        $form->ckeditor('explanation', '説明');

        $form->hasMany('workImages', '画像', function(Form\NestedForm $imagesForm){
            $imagesForm->image('path', '画像')->move('/tmp', function ($file){ //item_image
                return (string) Str::uuid() . '.' . $file->guessExtension();
            });

            // $imagesForm->switch('cover', '正方形トリミング')->states([
            //     'on'  => ['value' => (string) 1, 'text' => 'する', 'color' => 'success'],
            //     'off' => ['value' => (string) 0, 'text' => 'しない', 'color' => 'danger'],
            // ])->default('on');
        });

        $form->hasMany('workTools', 'ツール', function(Form\NestedForm $toolsForm){
            $toolsForm->select('base_tool_id', 'ツール名')
            ->options(
                  BaseTool::orderBy('sort', 'asc')->get()
                ->pluck('name', 'id')
            )->rules('required|exists:App\Models\BaseTool,id');
        });

        $form->hasMany('workPositions', '担当', function(Form\NestedForm $positionsForm){
            $positionsForm->select('base_position_id', '担当箇所')
            ->options(
                  BasePosition::orderBy('sort', 'asc')->get()
                ->pluck('name', 'id')
            )->rules('required|exists:App\Models\BasePosition,id');
        });

        $form->saved(function (Form $form) {
            /**
             * 画像保存の処理
             */
            $item = Work::whereId($form->model()->id)
                ->with('workImages')
                ->first();

            //この画像を保存すべきディレクトリpath
            $itemImageDir = '/work-images/' . $item->id;

            //画像をループ
            $item->workImages->each(function($image, $key) use ($itemImageDir){
                //一時ディレクトリ「tmp」に保存されている画像かどうか判定
                preg_match('{^tmp/(.+?)\.(.+?)$}us', $image->path, $match);

                if(!isset($match[2])){
                    //正規表現に一致してない場合はスキップ
                    return;
                }

                [$origin, $fileName, $extension] = $match;

                //新しいpathを組み立てる
                $newPath =  $itemImageDir . '/' . $image->id . '.' . $extension;

                //新しいpathの画像が既に存在する場合は削除しておく
                if(Storage::exists($newPath)){
                    Storage::delete($newPath);
                }

                //新しいpathにファイルを移動させて、画像情報も更新する
                if(Storage::move($image->path, $newPath) === true){
                    $image->update([
                        'path' => $newPath,
                    ]);
                }
            });

            //余計な画像を削除する
            $itemImages = $item->workImages->pluck('path'); //今商品とデータ的に関連づいてる画像パス

            //この商品の画像ディレクトリにあるすべての画像ファイル
            collect(Storage::files($itemImageDir))->each(function($dirImage) use ($itemImages) {
                if(!$itemImages->contains('/' . $dirImage)){
                    Storage::delete('/' . $dirImage);
                }
            });
        });


        return $form;
    }
}
