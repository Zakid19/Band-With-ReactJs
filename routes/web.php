<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\BandController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\LyricController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function() {

    // Band Route
    Route::get('band/manage', [BandController::class, 'manage'])->name('band.manage');
    Route::get('band/create', [BandController::class, 'create'])->name('band.create');
    Route::post('band/store', [BandController::class, 'store'])->name('band.store');
    Route::get('band/{band:slug}/detail', [BandController::class, 'detail'])->name('band.detail');
    Route::get('band/{band:slug}/edit', [BandController::class, 'edit'])->name('band.edit');
    Route::put('band/{band:slug}/update', [BandController::class, 'update'])->name('band.update');
    Route::delete('band/{band:slug}/delete', [BandController::class, 'delete'])->name('band.delete');

    // Album Route
    Route::get('album/manage', [AlbumController::class, 'manage'])->name('album.manage');
    Route::get('album/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('album/store', [AlbumController::class, 'store'])->name('album.store');
    Route::get('album/{album:slug}/detail', [AlbumController::class, 'detail'])->name('album.detail');
    Route::get('album/{album:slug}/edit', [AlbumController::class, 'edit'])->name('album.edit');
    Route::put('album/{album:slug}/update', [AlbumController::class, 'update'])->name('album.update');
    Route::delete('album/{album:slug}/delete', [AlbumController::class, 'delete'])->name('album.delete');
    Route::get('album/get-album-by-{band}', [AlbumController::class, 'getALbumByBandId']);

    // Genre Route
    Route::get('genre/manage', [GenreController::class, 'manage'])->name('genre.manage');
    Route::get('genre/create', [GenreController::class, 'create'])->name('genre.create');
    Route::post('genre/store', [GenreController::class, 'store'])->name('genre.store');
    Route::get('genre/{genre:slug}/detail', [GenreController::class, 'detail'])->name('genre.detail');
    Route::get('genre/{genre:slug}/edit', [GenreController::class, 'edit'])->name('genre.edit');
    Route::put('genre/{genre:slug}/update', [GenreController::class, 'update'])->name('genre.update');
    Route::delete('genre/{genre:slug}/delete', [GenreController::class, 'delete'])->name('genre.delete');

    // Lyric Route
    Route::get('lyric/manage', [LyricController::class, 'manage'])->name('lyric.manage');
    Route::get('lyric/create', [LyricController::class, 'create'])->name('lyric.create');
    Route::post('lyric/store', [LyricController::class, 'store'])->name('lyric.store');
    Route::get('lyric/{lyric}/show', [LyricController::class, 'show'])->name('lyric.show');
    Route::get('lyric/{lyric:slug}/edit', [LyricController::class, 'edit'])->name('lyric.edit');
    Route::put('lyric/{lyric:slug}/update', [LyricController::class, 'update'])->name('lyric.update');
    Route::delete('lyric/{lyric:slug}/delete', [LyricController::class, 'delete'])->name('lyric.delete');
});
