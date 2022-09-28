<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionsSeeder extends Seeder
{
    protected $items = [
        'top_title_head' => 'インスピレーションを感じる出会いをあなたに',
        'top_title' => 'Nao',
        'top_text' => <<<TEXT
プログラマーをしております。\n
phpフレームワークのLaravelでの開発が得意です。
TEXT,
        'about_first_title' => 'I more',
        'about_first_text' => <<<TEXT
以前は市役所で働いていました。\n
退職後はwebエンジニアとして活動しています。
TEXT,
        'about_second_title' => 'Hobby',
        'about_second_text' => <<<TEXT
ゲームが趣味です。
最近はボードゲームにハマっています。
TEXT,
        'about_third_title' => 'Laravel',
        'about_third_text' => <<<TEXT
Laravelフレームワークが好きです。\n
LaravelMixやMockerなど便利な機能が\n
たくさんあって嬉しいですね。
TEXT,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->items as $key => $item) {
            //Option::UpdateOrCreate([ //強制的に上書きはこっち
            Option::firstOrCreate([
                'name' => $key,
            ], [
                is_scalar($item) ? 'value' : 'json' => $item,
            ]);
        }
    }
}
