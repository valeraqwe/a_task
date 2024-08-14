<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\TVMazeService;
use Illuminate\Http\JsonResponse;

class TVMazeController extends Controller
{
    protected $tvMazeService;

    public function __construct(TVMazeService $tvMazeService)
    {
        $this->tvMazeService = $tvMazeService;
    }

    public function search(SearchRequest $request): JsonResponse
    {
        $results = $this->tvMazeService->searchTVMaze($request->query('q'));

        if (isset($results['error'])) {
            return response()->json($results, 500);
        }

        return response()->json($results);
    }
}
