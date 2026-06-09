<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movie.index');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');

Route::post('/watchlist/add/{id}', [WatchlistController::class, 'store'])->name('watchlist.store');
Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
Route::delete('/watchlist/remove/{id}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');