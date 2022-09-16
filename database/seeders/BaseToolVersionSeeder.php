<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BaseToolVersion;

class BaseToolVersionSeeder extends Seeder
{
    protected const ITEMS = [
        ['base_tool_id' => 1, 'version' => '8.0'],
        ['base_tool_id' => 3, 'version' => '5'],
        ['base_tool_id' => 4, 'version' => '3'],
        ['base_tool_id' => 7, 'version' => '8'],
        ['base_tool_id' => 7, 'version' => '9'],
        ['base_tool_id' => 12, 'version' => '5.7'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            BaseToolVersion::firstOrCreate($item, $item);
        }
    }
}
