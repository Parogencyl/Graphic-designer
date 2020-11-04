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


Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/setPlLanguage', [App\Http\Controllers\MainController::class, 'setPlLanguage']);
Route::get('/setEngLanguage', [App\Http\Controllers\MainController::class, 'setEngLanguage']);

Route::post('/sendEmail', [App\Http\Controllers\MainController::class, 'sendEmail']);

Route::get('/projects', [App\Http\Controllers\ProjectsController::class, 'index']);

Route::get('/offers', [App\Http\Controllers\OffersController::class, 'index']);

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog/post/id={id}', [App\Http\Controllers\PostController::class, 'index']);

Route::post('/blog/post/comment', [App\Http\Controllers\PostController::class, 'addComment']);
Route::get('/blog/tag/{tagName}', [App\Http\Controllers\PostController::class, 'getTags']);

Route::post('/offers/paymentController', [App\Http\Controllers\PaypalController::class, 'index']);

Route::get('/offers/payment', function () {
    return view('paywithpaypal');
});
