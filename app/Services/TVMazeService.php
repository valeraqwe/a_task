<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TVMazeService
{
    public function searchTVMaze(string $query): array
    {
        $response = Http::get("http://api.tvmaze.com/search/shows", ['q' => $query]);

        if ($response->failed()) {
            return ['error' => 'Failed to fetch data from TVMaze'];
        }

        $results = collect($response->json())->filter(function ($show) use ($query) {
            return strcasecmp($show['show']['name'], $query) === 0;
        });

        return $results->values()->toArray();
    }
}
