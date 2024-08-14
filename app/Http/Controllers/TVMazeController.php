<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TVMazeController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $query = $request->query('q');

        if (!$query) {
            return response()->json(['error' => 'Query parameter is required'], 400);
        }

        $response = Http::get("http://api.tvmaze.com/search/shows?q={$query}");

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch data from TVMaze'], 500);
        }

        $results = collect($response->json())->filter(function ($show) use ($query) {
            return strcasecmp($show['show']['name'], $query) === 0;
        });

        return response()->json($results->values());
    }
}

