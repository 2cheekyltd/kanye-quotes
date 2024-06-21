<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Quote;

class QuoteFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed the database with 5 quotes
        Quote::factory()->count(5)->create();
    }

    public function test_get_quotes()
    {
        echo ('API KEY: ' . config('app.api_token'));
        // echo ('API KEY 2: ' . config('app.apikey'));
        // echo (env('app.api_token')),
        $response = $this->withHeaders([
            'API-TOKEN' => config('app.api_token'),
        ])->get('/api/quotes');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function test_refresh_quotes()
    {
        $response = $this->withHeaders([
            'API-TOKEN' => config('app.api_token'),
        ])->post('/api/quotes/refresh');

        $response->assertStatus(200)
            ->assertJson(['message' => 'Quotes refreshed successfully']);
    }
}
