<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MoviesController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Middleware\EnsureTokenIsValid;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/movies', [MoviesController::class, 'index']);
Route::get('/movies/{id}', [MoviesController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::post('/movies', [MoviesController::class, 'store']);
    Route::put('/movies/{id}', [MoviesController::class, 'update']);
    Route::delete('/movies/{id}', [MoviesController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});