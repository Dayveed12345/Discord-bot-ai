<?php

use Illuminate\Support\Facades\Route;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

Route::get('/', function () {
    return view('welcome');
});

