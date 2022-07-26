<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('/movies', App\Http\Controllers\Api\MoviesController::class);

Route::get('/movies', [MoviesController::class, 'index']);
Route::get('/movies/{id}', [MoviesController::class, 'show']);
Route::get('/movies/search/{title}', [MoviesController::class, 'search']);
Route::post('/movies', [MoviesController::class, 'store']);
Route::delete('/movies', [MoviesController::class, 'destroy']);