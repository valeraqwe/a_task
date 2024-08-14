<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TVMazeController;

Route::get('/', function () {
    return redirect('/search');
});

Route::get('/search', [TVMazeController::class, 'search']);

