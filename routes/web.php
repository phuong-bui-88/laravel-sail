<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/hello', [\App\Http\Controllers\HomeController::class, 'hello']);

Route::get('/user/{name}', [\App\Http\Controllers\UserController::class, 'show']);

Route::get('/cache/{id}', [\App\Http\Controllers\CacheController::class, 'cache']);

Route::middleware('auth')->group(function () {
    Route::prefix('app')->group(function () {
        Route::resource('articles', \App\Http\Controllers\ArticleController::class);
    });
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/php', function () {
    return phpinfo();
});

require  __DIR__ . '/auth.php';
