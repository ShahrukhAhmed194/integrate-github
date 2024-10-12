<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;


Route::get('/', [GitHubController::class, 'redirectToGitHub'])->name('auth.github');
Route::get('auth/callback', [GitHubController::class, 'handleGitHubCallback']);
Route::get('profile', [GitHubController::class, 'showProfile'])->name('profile');