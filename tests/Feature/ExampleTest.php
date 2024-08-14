<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {

        $response = $this->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/search');

        $response = $this->get('/search?q=test');
        $response->assertStatus(200);
    }
}
