<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BaseToolCategory;

class BaseToolCategorySeeder extends Seeder
{
    protected const ITEMS = [
        ['name' => '言語', 'name_en' => 'language', 'slug' => 'language'],
        ['name' => 'フレームワーク', 'name_en' => 'framework', 'slug' => 'framework'],
        ['name' => 'ツール', 'name_en' => 'tools', 'slug' => 'tools'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Level::truncate();
        foreach (self::ITEMS as $item) {
            BaseToolCategory::firstOrCreate($item, $item);
        }
    }
}
