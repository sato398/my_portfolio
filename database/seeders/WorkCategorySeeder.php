<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkCategory;

class WorkCategorySeeder extends Seeder
{
    protected const ITEMS = [
        ['name' => 'アプリケーション', 'slug' => 'application'],
        ['name' => 'コーディング', 'slug' => 'coding'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            WorkCategory::firstOrCreate($item, $item);
        }
    }
}
