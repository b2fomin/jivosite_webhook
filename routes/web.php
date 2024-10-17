<?php

use App\Http\Controllers\WebHook;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhook', WebHook\IndexController::class);