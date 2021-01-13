<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Auth::routes();


Route::get('/login/github',[LoginController::class,'github']);
Route::get('/login/github/redirect',[LoginController::class,'githubRedirect']);

Route::get('/login/facebook',[LoginController::class,'facebook']);
Route::get('/login/facebook/redirect',[LoginController::class,'facebookRedirect']);

/*
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});

*/

Route::get('{any}', [AppController::class, 'index'])->where('any','.*')->middleware('auth')->name('home');
