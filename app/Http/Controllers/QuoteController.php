<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Quote;
use Illuminate\Support\Facades\Cache;

class QuoteController extends Controller
{
    public function getQuotes()
    {
        return Cache::remember('quotes', 60, function () {
            return Quote::inRandomOrder()->take(5)->get();
        });
    }

    public function refreshQuotes()
    {
        Cache::forget('quotes');
        Quote::truncate();

        $quotes = [];
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://api.kanye.rest');
            $quotes[] = ['quote' => $response['quote']];
        }
        Quote::insert($quotes);

        return response()->json(['message' => 'Quotes refreshed successfully'], 200);
    }
}
