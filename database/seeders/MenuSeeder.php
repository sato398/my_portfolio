<?php

namespace Database\Seeders;

use Encore\Admin\Auth\Database\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    protected const ITEMS = [
        ['title' => 'ベースツールカテゴリー', 'parent_id' => 0,'order' => 1, 'icon' => 'fa-bars', 'uri' => 'base-tool-categories'],
        ['title' => 'ベースツール', 'parent_id' => 0,'order' => 2, 'icon' => 'fa-toolbox', 'uri' => 'base-tools'],
        ['title' => 'ツールバージョンソート', 'parent_id' => 0,'order' => 3, 'icon' => 'fa-sort', 'uri' => 'base-tool-version-sort'],
        ['title' => 'ベースポジション', 'parent_id' => 0,'order' => 4, 'icon' => 'fa-cube', 'uri' => 'base-positions'],
        ['title' => 'ベースポジションソート', 'parent_id' => 0,'order' => 5, 'icon' => 'fa-sort', 'uri' => 'base-positions-sort'],
        ['title' => 'スキル', 'parent_id' => 0,'order' => 6, 'icon' => 'fa-screwdriver-wrench', 'uri' => 'skils'],
        ['title' => 'スキルカテゴリーソート', 'parent_id' => 0,'order' => 7, 'icon' => 'fa-sort', 'uri' => 'skil-sort'],
        ['title' => 'スキルソート', 'parent_id' => 0,'order' => 8, 'icon' => 'fa-sort', 'uri' => 'skil-tool-sort'],
        ['title' => 'ワークカテゴリー', 'parent_id' => 0,'order' => 9, 'icon' => 'fa-bars', 'uri' => 'work-categories'],
        ['title' => 'ワーク', 'parent_id' => 0,'order' => 10, 'icon' => 'fa-briefcase', 'uri' => 'works'],
        ['title' => 'ワークカテゴリーソート', 'parent_id' => 0,'order' => 11, 'icon' => 'fa-sort', 'uri' => 'work-category-sort'],
        ['title' => 'ワークソート', 'parent_id' => 0,'order' => 12, 'icon' => 'fa-sort', 'uri' => 'work-sort'],
        ['title' => 'ワークイメージソート', 'parent_id' => 0,'order' => 13, 'icon' => 'fa-sort', 'uri' => 'work-image-sort'],
        ['title' => 'オプション', 'parent_id' => 0,'order' => 14, 'icon' => 'fa-gear', 'uri' => 'options'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        foreach (self::ITEMS as $item) {
            Menu::firstOrCreate($item, $item);
        }
    }
}
