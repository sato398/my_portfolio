<?php

namespace Database\Seeders;

use Encore\Admin\Auth\Database\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    protected const MENU_ITEMS = [
        ['title' => 'ベースツールカテゴリー', 'parent_id' => 0,'order' => 1, 'icon' => 'fa-cube', 'uri' => 'base-tool-categories'],
        ['title' => 'ベースツール', 'parent_id' => 0,'order' => 2, 'icon' => 'fa-yen', 'uri' => 'base-tools'],
        ['title' => 'ベースポジション', 'parent_id' => 0,'order' => 3, 'icon' => 'fa-cube', 'uri' => 'base-positions'],
        ['title' => 'スキル', 'parent_id' => 0,'order' => 4, 'icon' => 'fa-sort-amount-desc', 'uri' => 'skils'],
        ['title' => 'スキルカテゴリーソート', 'parent_id' => 0,'order' => 5, 'icon' => 'fa-sort-amount-desc', 'uri' => 'skil-sort'],
        ['title' => 'スキルソート', 'parent_id' => 0,'order' => 6, 'icon' => 'fa-sort-amount-desc', 'uri' => 'skil-tool-sort'],
        ['title' => 'ワークカテゴリー', 'parent_id' => 0,'order' => 7, 'icon' => 'fa-sort-amount-desc', 'uri' => 'work-categories'],
        ['title' => 'ワーク', 'parent_id' => 0,'order' => 8, 'icon' => 'fa-sort-amount-desc', 'uri' => 'works'],
        ['title' => 'ワークカテゴリーソート', 'parent_id' => 0,'order' => 9, 'icon' => 'fa-sort-amount-desc', 'uri' => 'work-category-sort'],
        ['title' => 'ワークソート', 'parent_id' => 0,'order' => 10, 'icon' => 'fa-sort-amount-desc', 'uri' => 'work-sort'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        foreach (self::MENU_ITEMS as $item) {
            Menu::firstOrCreate($item, $item);
        }
    }
}
