<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $musicas = [
            [
                'title' => 'Pagode em Brasília',
                'url' => 'lpGGNA6_920',
                'cover' => 'https://img.youtube.com/vi/lpGGNA6_920/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'O Mineiro e o Italiano',
                'url' => 's9kVG2ZaTS4',
                'cover' => 'https://img.youtube.com/vi/s9kVG2ZaTS4/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'A Coisa Tá Feia',
                'url' => 'bizflU238DY',
                'cover' => 'https://img.youtube.com/vi/bizflU238DY/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Rio de Lágrimas',
                'url' => 'FxXXvPL3JIg',
                'cover' => 'https://img.youtube.com/vi/FxXXvPL3JIg/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Terra Roxa',
                'url' => '4Nb89GFu2g4',
                'cover' => 'https://img.youtube.com/vi/4Nb89GFu2g4/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Tristeza do Jeca',
                'url' => 'tRQ2PWlCcZk',
                'cover' => 'https://img.youtube.com/vi/tRQ2PWlCcZk/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Boi Soberano',
                'url' => 'SSg1WzXKnDk',
                'cover' => 'https://img.youtube.com/vi/SSg1WzXKnDk/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Rei do Gado',
                'url' => 'w1YTPd82Sok',
                'cover' => 'https://img.youtube.com/vi/w1YTPd82Sok/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'A vaca já foi pro brejo',
                'url' => '2bM30c50lYk',
                'cover' => 'https://img.youtube.com/vi/2bM30c50lYk/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Menino da Porteira',
                'url' => 'z5oJt49617w',
                'cover' => 'https://img.youtube.com/vi/z5oJt49617w/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Chora Viola',
                'url' => '5r6hV2e956w',
                'cover' => 'https://img.youtube.com/vi/5r6hV2e956w/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Travessia do Araguaia',
                'url' => 'z5oJt49617w',
                'cover' => 'https://img.youtube.com/vi/z5oJt49617w/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Amargurado',
                'url' => 'K5t98P5z32k',
                'cover' => 'https://img.youtube.com/vi/K5t98P5z32k/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Velho Peão',
                'url' => '4134914102',
                'cover' => 'https://img.youtube.com/vi/4134914102/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
            [
                'title' => 'Ferreirinha',
                'url' => '5134914102',
                'cover' => 'https://img.youtube.com/vi/5134914102/hqdefault.jpg',
                'views' => rand(100, 10000),
            ],
        ];

        $now = Carbon::now();

        foreach ($musicas as $musica) {
            DB::table('music')->insert([
                'title' => $musica['title'],
                'url' => $musica['url'],
                'cover' => $musica['cover'],
                'views' => $musica['views'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
