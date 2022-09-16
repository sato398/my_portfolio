<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BasePosition;

class BasePositionSeeder extends Seeder
{
    protected const ITEMS = [
        ['name' => 'PG', 'slug' => 'pg'],
        ['name' => '基本設計', 'slug' => 'basic-design'],
        ['name' => 'DB構築', 'slug' => 'database-construction'],
        ['name' => 'コーダー', 'slug' => 'coder'],
        ['name' => '単体テスト', 'slug' => 'unit'],
        ['name' => '複合テスト', 'slug' => 'Feature'],
        ['name' => 'API作成', 'slug' => 'create-api'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            BasePosition::firstOrCreate($item, $item);
        }
    }
}
