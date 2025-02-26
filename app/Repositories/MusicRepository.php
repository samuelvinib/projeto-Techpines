<?php
namespace App\Repositories;

use App\Models\Music;

class MusicRepository
{
    public function getMostViewed(int $limit = 5)
    {
        return Music::orderByDesc('views')->limit($limit)->get();
    }

    public function findByTitle(string $title)
    {
        return Music::where('title', 'LIKE', "%$title%")->get();
    }

    public function findByUrl(string $url)
    {
        return Music::where('url', $url)->first();
    }

    public function create(array $data): Music
    {
        return Music::create($data);
    }
}
