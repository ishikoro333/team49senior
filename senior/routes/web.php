<?php

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


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeniorListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('seniorList', SeniorListController::class);
Route::resource('fav', FavController::class)->except('index');
Route::get('fav/{fav}/favAdd', [FavController::class, 'favAdd'])->name('fav.favAdd');

Route::get('/services/signin', [App\Http\Controllers\ServiceController::class, 'index'])->name('signin.index');
Route::post('/services/signin', [App\Http\Controllers\ServiceController::class, 'postSignIn'])->name('services.postSignin');
Route::get('/services/signup', [App\Http\Controllers\ServiceController::class, 'signup'])->name('services.signup'); //ログイン
Route::post('/services/signup', [App\Http\Controllers\ServiceController::class, 'store'])->name('services.store');//アカウント登録
