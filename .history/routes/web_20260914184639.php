<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/whoami', function () {
    return 'Kenart G. Aquino | Block 4C | ITRACKB4 Laravel 12';
});

// Custom route — must sit ABOVE the resource line (Part C)
Route::get('/movies/filter/{genre?}', [MovieController::class, 'filter'])->name('movies.filter');

// Part D: only register the actions you've actually implemented
Route::resource('movies', MovieController::class)->only(['index', 'show']);