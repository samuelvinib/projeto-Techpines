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

    public function findById(int $id): ?Music
    {
        return Music::find($id);
    }

    public function update(int $id, array $data): bool
    {
        $music = Music::find($id);
        if ($music) {
            return $music->update($data);
        }

        return false;
    }

    public function delete(int $id): bool
    {
        $music = Music::find($id);
        if ($music) {
            return $music->delete();
        }

        return false;
    }
}
