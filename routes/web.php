<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(
    '/',
    function () {
        return redirect()->route('posts.index');
    }
);

Route::get('/posts', [ PostController::class, 'index' ])->name('posts.index');
Route::get('/posts/create', [ PostController::class, 'create' ])->name('posts.create');
Route::get('/posts/export', [ PostController::class, 'export' ])->name('posts.export');
Route::get('/posts/download', [ PostController::class, 'download' ])->name('posts.download');
Route::post('/posts', [ PostController::class, 'store' ])->name('posts.store');

