<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            MenuSeeder::class,
            AdminUserSeeder::class,
            BaseToolCategorySeeder::class,
            BasePositionSeeder::class,
            BaseToolSeeder::class,
            SkilSeeder::class,
            SkilToolSeeder::class,
            WorkCategorySeeder::class,
            BaseToolVersionSeeder::class,
            OptionsSeeder::class,
        ]);
    }
}
