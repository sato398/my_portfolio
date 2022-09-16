<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BaseTool;
use App\Models\BaseToolCategory;

class BaseToolSeeder extends Seeder
{
    protected const ITEMS = [
        ['name' => 'PHP', 'slug' => 'php', 'base_tool_category_id' => 1], //1
        ['name' => 'JavaScript', 'slug' => 'javascript', 'base_tool_category_id' => 1], //2
        ['name' => 'HTML', 'slug' => 'html', 'base_tool_category_id' => 1], //3
        ['name' => 'CSS', 'slug' => 'css', 'base_tool_category_id' => 1], //4
        ['name' => 'SQL', 'slug' => 'sql', 'base_tool_category_id' => 1], //5
        ['name' => 'Sacc', 'slug' => 'sass', 'base_tool_category_id' => 1], //6
        ['name' => 'Laravel', 'slug' => 'laravel', 'base_tool_category_id' => 2], //7
        ['name' => 'jQuery', 'slug' => 'jquery', 'base_tool_category_id' => 2], //8
        ['name' => 'Bootstrap', 'slug' => 'bootstrap', 'base_tool_category_id' => 2], //9
        ['name' => 'Docker', 'slug' => 'docker', 'base_tool_category_id' => 3], //10
        ['name' => 'GitHub', 'slug' => 'github', 'base_tool_category_id' => 3], //11
        ['name' => 'Mysql', 'slug' => 'mysql', 'base_tool_category_id' => 3], //12
        ['name' => 'CircleCI', 'slug' => 'circleci', 'base_tool_category_id' => 3], //13
        ['name' => 'Node.js', 'slug' => 'nodejs', 'base_tool_category_id' => 3], //14
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            BaseTool::firstOrCreate($item, $item);
        }
    }
}
