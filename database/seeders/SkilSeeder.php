<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skil;

class SkilSeeder extends Seeder
{
    protected const ITEMS = [
        ['base_tool_category_id' => 1],
        ['base_tool_category_id' => 2],
        ['base_tool_category_id' => 3],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            Skil::firstOrCreate($item, $item);
        }
    }
}
