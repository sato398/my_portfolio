<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BaseToolCategory;

class BaseToolCategorySeeder extends Seeder
{
    protected const ITEMS = [
        ['name' => '言語', 'slug' => 'language'],
        ['name' => 'フレームワーク', 'slug' => 'framework'],
        ['name' => 'ツール', 'slug' => 'tools'],
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
