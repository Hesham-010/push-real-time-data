<?php

use App\Events\PushEvent;
use App\Http\Controllers\PushController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/sent-data', [PushController::class, 'push'])->name('send');
