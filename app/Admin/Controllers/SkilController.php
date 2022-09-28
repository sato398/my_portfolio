<?php

namespace App\Admin\Controllers;

use App\Models\Skil;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;
use App\Models\BaseToolCategory;
use App\Models\BaseTool;
use App\Models\SkilTool;
use Encore\Admin\Widgets\Table;
use App\Services\Skil\SkilDevYearsEnum;
use Illuminate\Support\Str;

class SkilController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Skil';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $baseTools = BaseTool::all();

        $grid = new Grid(new Skil());

        $grid->model()->orderBy('sort', 'asc');

        $grid->baseToolCategory()->name('カテゴリー名');
        $grid->column('sort', 'ソート順')->sortable();
        $grid->column('items', 'ツール')->display(function () {
            return '一覧';
        })->expand(function () use ($baseTools) {
            $items = $this->items;
            $itemName = [];
            $itemNameItem = [];

            foreach ($items as $item) {
                $itemNameItem[] = $baseTools->where('id', $item['base_tool_id'])->first()->name;
                $itemNameItem[] = SkilDevYearsEnum::getDescription($item['years_of_dev']);
                $itemNameItem[] = "<i class=\"{$item['icon']}\"></i>";
                $itemNameItem[] = $item['sort'];
                $itemNameItemWrap[] = $itemNameItem;
                $itemNameItem = [];
            }
            $itemNameTable = new Table(['名前', '開発年数', 'アイコン', 'ソート順'], $itemNameItemWrap);
            $itemName[] = [$itemNameTable];
            return new Table(['ツール'], $itemName);
        });

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
        $show = new Show(Skil::findOrFail($id));

        $show->field('base_tool_category_id', 'カテゴリー名');
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
        $values = SkilDevYearsEnum::getValues();
        $devEnums = [];
        foreach ($values as $key => $value) {
            $devEnums[$value] = SkilDevYearsEnum::getDescription($value);
        }

        $form = new Form(new Skil());

        $form->select('base_tool_category_id', 'カテゴリー名')
        ->options(
            BaseToolCategory::orderBy('sort', 'asc')->get()
            ->pluck('name', 'id')
        )->rules('required|exists:App\Models\BaseToolCategory,id');
        $form->hasMany('items', 'ツール', function (Form\NestedForm $toolsForm) use ($form, $devEnums) {
            $toolsForm->select('base_tool_id', 'ツール名')
            ->options(
                BaseTool::orderBy('sort', 'asc')->get()
                ->pluck('name', 'id')
            )->rules('required|exists:App\Models\BaseTool,id');
            $toolsForm->select('years_of_dev', '開発年数')
            ->options(
                $devEnums
            )->rules('required');
            $toolsForm->icon('icon', 'アイコン');
        })->useTable();

        $form->confirm('本当に登録しますか？', 'create');
        $form->confirm('本当に変更しますか？', 'edit');

        if ($form->isCreating()) {
            $exist = false;
            $form->saving(function ($form) use (&$exist) {
                $slug = $form->input('slug');
                $slug = str_replace(' ', '-', $slug);
                $slug = Str::lower($slug);
                $form->input('slug', $slug);

                $category = $form->input('base_tool_category_id');
                $skil = Skil::where('base_tool_category_id', $category)->first();
                if (!isset($skil)) {
                    $exist = false;
                } else {
                    foreach ($form->items as $key => $item) {
                        SkilTool::updateOrcreate(
                            ['skil_id' => $skil->id,'base_tool_id' => $item['base_tool_id']],
                            ['years_of_dev' => $item['years_of_dev'], 'icon' => $item['icon']],
                        );
                    }
                    $exist = true;
                }

                if ($exist) {
                    return redirect(config('admin.route.prefix') . '/skils');
                }
            });
        }

        $form->saving(function ($form) {
            $slug = $form->input('slug');
            $slug = str_replace(' ', '-', $slug);
            $slug = Str::lower($slug);
            $form->input('slug', $slug);
        });

        return $form;
    }
}
