<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;

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

Route::get('/', [newsController::class, 'home']);

Route::get('{sity?}/news', [newsController::class, 'index']);

Route::get('/news/{id}', [newsController::class, 'show']);

Route::post('/search', [newsController::class, 'search']);

Route::get('favorite/{news_id}', [newsController::class, 'addFavorite']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
