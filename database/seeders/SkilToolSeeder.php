<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SkilTool;

class SkilToolSeeder extends Seeder
{
    protected const ITEMS = [
        ['skil_id' => 1, 'base_tool_id' => 1, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 1, 'base_tool_id' => 2, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 1, 'base_tool_id' => 3, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 1, 'base_tool_id' => 4, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 1, 'base_tool_id' => 5, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 1, 'base_tool_id' => 6, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 2, 'base_tool_id' => 7, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 2, 'base_tool_id' => 8, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 2, 'base_tool_id' => 9, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 3, 'base_tool_id' => 10, 'years_of_dev' => 0, 'icon' => ''],
        ['skil_id' => 3, 'base_tool_id' => 11, 'years_of_dev' => 0, 'icon' => ''],
        ['skil_id' => 3, 'base_tool_id' => 12, 'years_of_dev' => 1, 'icon' => ''],
        ['skil_id' => 3, 'base_tool_id' => 13, 'years_of_dev' => 0, 'icon' => ''],
        ['skil_id' => 3, 'base_tool_id' => 14, 'years_of_dev' => 0, 'icon' => ''],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            SkilTool::firstOrCreate($item, $item);
        }
    }
}
