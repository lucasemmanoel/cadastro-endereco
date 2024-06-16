<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_health_check_response_success(): void
    {
        $response = $this->get('api/health-check');

        $response->assertStatus(Response::HTTP_OK);
    }
}
