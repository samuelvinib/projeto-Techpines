<?php

namespace Database\Seeders;

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
                'video_id' => 'lpGGNA6_920',
            ],
            [
                'title' => 'O Mineiro e o Italiano',
                'video_id' => 's9kVG2ZaTS4',
            ],
            [
                'title' => 'A Coisa Tá Feia',
                'video_id' => 'bizflU238DY',
            ],
            [
                'title' => 'Rio de Lágrimas',
                'video_id' => 'FxXXvPL3JIg',
            ],
            [
                'title' => 'Terra Roxa',
                'video_id' => '4Nb89GFu2g4',
            ],
            [
                'title' => 'Tristeza do Jeca',
                'video_id' => 'tRQ2PWlCcZk',
            ],
            [
                'title' => 'Boi Soberano',
                'video_id' => 'SSg1WzXKnDk',
            ],
            [
                'title' => 'Rei do Gado',
                'video_id' => 'w1YTPd82Sok',
            ],
        ];

        $now = Carbon::now();

        foreach ($musicas as $musica) {
            DB::table('music')->insert([
                'title' => $musica['title'],
                'url' => "https://www.youtube.com/watch?v={$musica['video_id']}", // URL completa
                'cover' => "https://img.youtube.com/vi/{$musica['video_id']}/hqdefault.jpg",
                'views' => rand(100, 10000),
                'status' => 'approved',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
