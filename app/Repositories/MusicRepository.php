<?php
namespace App\Repositories;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicRepository
{
    protected $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
    public function getPageView()
    {
        $perPage = $this->request->input('per_page', 5);

        $page = $this->request->input('page', 1);

        $musics = Music::orderByDesc('views')->paginate($perPage);

        return response()->json($musics);
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
