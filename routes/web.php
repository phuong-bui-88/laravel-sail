<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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


Route::get('/user/{user}', [\App\Http\Controllers\HomeController::class, 'loadUser']);

Route::get('/user/{user}/scope', [\App\Http\Controllers\HomeController::class, 'loadUserScope']);

Route::get('/token', function () {
    return 'my token';
})->middleware('auth:api');

Route::get('order', function () {
    return 'my order';
})->middleware(['auth:api', 'scopes:place-orders']);

Route::get('/orders', [\App\Http\Controllers\HomeController::class, 'orders'])->middleware('client');

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

Route::get('/rule', function () {

    $input = [
        'field_1' => 'Abc',
        'field_2' => 'foo',
        'field_3' => 'bar',
    ];

    // 1,2...5
    $validator = Validator::make($input, [
        'field_2' => [
            function ($attribute, $value, $fail) {
                dd($attribute, $value);
                if ($value == 'foo') {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }
        ],
    ]);

    if ($validator->fails()) {
        dd($validator);
    }

    return $validator->validated();
});


Route::get('/template', [\App\Http\Controllers\ShopController::class, 'index'])->name('template');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');

Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
   Route::resource('categories', \App\Http\Controllers\CategoryController::class);
   Route::resource('products', \App\Http\Controllers\ProductController::class);
});

require  __DIR__ . '/auth.php';
