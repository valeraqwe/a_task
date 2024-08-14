<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class TVMazeControllerTest extends TestCase
{
    public function testSearch()
    {
        Http::fake([
            'http://api.tvmaze.com/search/shows' => Http::response([
                ['show' => ['name' => 'Deadwood']],
            ]),
        ]);

        $response = $this->get('/search?q=Deadwood');

        $response->assertStatus(200);
        $response->assertJson([
            ['show' => ['name' => 'Deadwood']],
        ]);
    }
}
