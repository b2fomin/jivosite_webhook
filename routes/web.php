<?php

use App\Http\Controllers\WebHook\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhook', IndexController::class);