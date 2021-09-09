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

Route::get('/news', [newsController::class, 'allNews']);

Route::get('{city}/news', [newsController::class, 'allNews']);

Route::get('/news/{id}', [newsController::class, 'show'])->name('show');

Route::post('/search', [newsController::class, 'search']);

Route::get('set/favorite/{id}', [newsController::class, 'setFavorite'])->name('setFavorite');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
