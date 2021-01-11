<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserControlller;
use App\Http\Controllers\UserPostController;
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

Route::middleware('auth:api')->group(function (){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('auth-user',[AuthUserController::class,'show']);

    Route::apiResource('/posts',PostController::class);
    Route::apiResource('/users', UserControlller::class);
    Route::apiResource('/users/{user}/posts', UserPostController::class,['as' => 'users.posts']);
});
