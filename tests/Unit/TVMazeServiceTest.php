<?php

namespace Tests\Unit;

use App\Services\TVMazeService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TVMazeServiceTest extends TestCase
{
    public function testSearchTVMaze()
    {
        Http::fake([
            'http://api.tvmaze.com/search/shows' => Http::response([
                ['show' => ['name' => 'Deadwood']],
                ['show' => ['name' => 'Deadpool']],
            ]),
        ]);

        $service = new TVMazeService();
        $results = $service->searchTVMaze('Deadwood');

        $this->assertCount(1, $results);
        $this->assertEquals('Deadwood', $results[0]['show']['name']);
    }
}
