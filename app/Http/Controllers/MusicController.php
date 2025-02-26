<?php

namespace App\Http\Controllers;

use App\Services\ScrapingService;
use Illuminate\Http\Request;
use App\Repositories\MusicRepository;

class MusicController extends Controller
{
    protected ScrapingService $scrapingService;
    protected $repository;

    // Injeta o serviço no controller
    public function __construct(ScrapingService $scrapingService, MusicRepository $repository)
    {
        $this->scrapingService = $scrapingService;
        $this->repository = $repository;
    }

    /**
     * Extracts video data and returns it as JSON.
     */
    public function extractData(Request $request)
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
        $result = $this->repository->create($videoInfo);
        return response()->json($result);
    }

    public function getData(Request $request){
        return $this->repository->getMostViewed();
    }
}
