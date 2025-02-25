<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VideoService
{
    /**
     * Extracts the video ID from a YouTube URL.
     */
    public function extractVideoId($url)
    {
        $patterns = [
            '/youtube\.com\/watch\?v=([^&]+)/', // youtube.com/watch?v=ID
            '/youtu\.be\/([^?]+)/',            // youtu.be/ID
            '/youtube\.com\/embed\/([^?]+)/',  // youtube.com/embed/ID
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    /**
     * Fetches video information from YouTube.
     */
    public function getVideoInfo($videoId)
    {
        $url = "https://www.youtube.com/watch?v=" . $videoId;

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ])->get($url);

        if (!$response->successful()) {
            return null;
        }

        $html = $response->body();

        // Extract the title
        if (!preg_match('/<title>(.+?) - YouTube<\/title>/', $html, $titleMatches)) {
            return null;
        }
        $title = html_entity_decode($titleMatches[1], ENT_QUOTES);

        // Extract the views count
        if (preg_match('/"viewCount":\s*"(\d+)"/', $html, $viewMatches)) {
            $views = (int)$viewMatches[1];
        } elseif (preg_match('/\"viewCount\"\s*:\s*{.*?\"simpleText\"\s*:\s*\"([\d,\.]+)\"/', $html, $viewMatches)) {
            $views = (int)str_replace(['.', ','], '', $viewMatches[1]);
        } else {
            $views = 0;
        }

        return [
            'title' => $title,
            'views' => $views,
            'youtube_id' => $videoId,
            'thumbnail' => "https://img.youtube.com/vi/$videoId/hqdefault.jpg"
        ];
    }
}
