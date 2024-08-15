<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class TVMazeService
{
    public function searchTVMaze(string $query): array
    {
        // Cache the result for 60 minutes
        return Cache::remember("tvmaze_search_{$query}", 60, function () use ($query) {
            $response = Http::get("http://api.tvmaze.com/search/shows", ['q' => $query]);

            if ($response->failed()) {
                return ['error' => 'Failed to fetch data from TVMaze'];
            }

            $results = collect($response->json())->filter(function ($show) use ($query) {
                return strcasecmp($show['show']['name'], $query) === 0;
            });

            return $results->values()->toArray();
        });
    }
}
