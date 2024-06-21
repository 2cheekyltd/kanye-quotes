<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

Route::middleware('api.token')->group(function () {
    Route::get('/quotes', [QuoteController::class, 'getQuotes']);
    Route::post('/quotes/refresh', [QuoteController::class, 'refreshQuotes']);
});
