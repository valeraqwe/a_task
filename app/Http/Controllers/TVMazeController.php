<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Http\JsonResponse;

class TVMazeController extends Controller
{
    public function search(SearchRequest $request): JsonResponse
    {
        $results = $request->searchTVMaze();

        if (isset($results['error'])) {
            return response()->json($results, 500);
        }

        return response()->json($results);
    }
}
