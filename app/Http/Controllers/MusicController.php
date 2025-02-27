<?php

namespace App\Http\Controllers;

use App\Services\ScrapingService;
use Illuminate\Http\Request;
use App\Repositories\MusicRepository;

class MusicController extends Controller
{
    protected ScrapingService $scrapingService;
    protected $repository;

    public function __construct(ScrapingService $scrapingService, MusicRepository $repository)
    {
        $this->scrapingService = $scrapingService;
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->input('url');
        $videoId = $this->scrapingService->extractVideoId($url);

        if (!$videoId) {
            return response()->json(['error' => 'Invalid YouTube URL'], 400);
        }

        $videoInfo = $this->scrapingService->getVideoInfo($videoId);

        if (!$videoInfo) {
            return response()->json(['error' => 'Video not found or unavailable'], 404);
        }
        $alreadyExists = $this->repository->findByUrl($url);
        if ($alreadyExists) {
            return response()->json(['error' => 'This video is already saved in the database.'], 404);
        }
        $result = $this->repository->create($videoInfo);
        return response()->json($result);
    }

    public function index()
    {
        return $this->repository->getApprovedMusics();
    }

    public function getPendingMusics(){
        return $this->repository->getPendingMusics();
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'cover' => 'sometimes|url',
            'views' => 'sometimes|integer|min:0',  // Validating that views cannot be negative
            'status' => 'in:pending,approved,rejected',  // Ensuring status is one of the valid values
            'url' => 'sometimes|url'
        ], [
            'status.in' => 'The status must be one of the following values: pending, approved, or rejected.',
            'views.min' => 'The views field cannot be negative.',
            'title.max' => 'The title cannot be more than 255 characters.',
            'url.url' => 'The provided URL is not valid.'
        ]);

        $updated = $this->repository->update($id, $request->all());

        if (!$updated) {
            return response()->json(['error' => 'Music not found or update failed'], 400);
        }

        $music = $this->repository->findById($id);

        return response()->json($music);
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'Music not found or delete failed'], 400);
        }

        return response()->json(['message' => 'Music deleted successfully']);
    }
}
