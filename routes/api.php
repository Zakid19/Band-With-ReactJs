<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\BandController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\LyricController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin'], function() {

});

// Band Api Route
Route::get('band/manage', [BandController::class, 'manage']);
Route::post('band/store', [BandController::class, 'store']);
Route::get('band/{band:slug}/detail', [BandController::class, 'detail']);
Route::put('band/{band:slug}/update', [BandController::class, 'update']);
Route::delete('band/{band:slug}/delete', [BandController::class, 'delete']);

// Album Api Route
Route::get('album/manage', [AlbumController::class, 'manage']);
Route::post('album/store', [AlbumController::class, 'store']);
Route::get('album/{album:slug}/detail', [AlbumController::class, 'detail']);
Route::put('album/{album:slug}/update', [AlbumController::class, 'update']);
Route::delete('album/{album:slug}/delete', [AlbumController::class, 'delete']);

// Genre Api Resource
Route::get('genre/manage', [GenreController::class, 'manage']);
Route::post('genre/store', [GenreController::class, 'store']);
Route::get('genre/{genre:slug}/detail', [GenreController::class, 'detail']);
Route::put('genre/{genre:slug}/update', [GenreController::class, 'update']);

// Lyric Api Route
Route::get('lyric/manage', [LyricController::class, 'manage']);
Route::post('lyric/store', [LyricController::class, 'store']);
Route::get('lyric/{lyric:slug}/show', [LyricController::class, 'show']);
Route::put('lyric/{lyric:slug}/update', [LyricController::class, 'update']);
Route::delete('lyric/{lyric:slug}/delete', [LyricController::class, 'delete']);
