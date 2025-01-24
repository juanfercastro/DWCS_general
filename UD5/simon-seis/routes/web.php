<?php

use App\Http\Controllers\SimonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/simon',[SimonController::class, 'simon']);