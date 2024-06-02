<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

Route::middleware(['auth'])->group(function () {
    Route::get('/vote', [VoteController::class, 'index'])->name('votes.index');
    Route::post('/vote', [VoteController::class, 'store'])->name('votes.store');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
