<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;
use App\Http\Controllers\JobController;


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

Route::prefix('game')->group(function () {
    Route::get('/count', [GameController::class, 'getCount']);
    Route::get('/most-hyped-from-all-time', [GameController::class, 'getBestRated']);
    Route::get('/genre-count', [GameController::class, 'getGenreCount']);
    Route::get('/theme-count', [GameController::class, 'getThemeCount']);
    Route::get('/{game}', [GameController::class, 'show']);
});

Route::prefix('job')->group(function () {
    Route::get('/', [JobController::class, 'index']);
    Route::post('/execute/{job}', [JobController::class, 'executeJob']);
});