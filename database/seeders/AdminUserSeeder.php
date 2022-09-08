<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Administrator;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminDefault = Administrator::whereId(1)->first();
        $adminDefault->update([
            'name' => '管理者',
            // 'avatar' => 'images/pdflogo.png',
        ]);
    }
}
