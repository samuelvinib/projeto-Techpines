<?php

namespace App\Http\Controllers;

use App\Services\VideoService;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $videoService;

    // Injeta o serviço no controller
    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
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
        $videoId = $this->videoService->extractVideoId($url);

        if (!$videoId) {
            return response()->json(['error' => 'Invalid YouTube URL'], 400);
        }

        $videoInfo = $this->videoService->getVideoInfo($videoId);

        if (!$videoInfo) {
            return response()->json(['error' => 'Video not found or unavailable'], 404);
        }

        return response()->json($videoInfo);
    }
}
