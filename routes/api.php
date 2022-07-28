<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MoviesController;

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

// Route::apiResource('/movies', App\Http\Controllers\Api\MoviesController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/movies', [MoviesController::class, 'index']);
Route::get('/movies/{id}', [MoviesController::class, 'show']);
Route::get('/movies/search/{title}', [MoviesController::class, 'search']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/profile', function() {
        return auth()->user();
    });
    Route::post('/movies', [MoviesController::class, 'store']);
    Route::put('/movies/{id}', [MoviesController::class, 'update']);
    Route::delete('/movies/{id}', [MoviesController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});