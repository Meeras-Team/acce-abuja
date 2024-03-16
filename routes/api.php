<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/post/{post:slug}', [\App\Http\Controllers\PostController::class, 'show']);

Route::get('/teams', [\App\Http\Controllers\TeamController::class, 'index']);

Route::get('/testimonies', [\App\Http\Controllers\TestimonyController::class, 'index']);
