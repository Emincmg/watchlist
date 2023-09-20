<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {return view('welcome');})->name('index');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['View'], function () {
        Route::get('/list', [App\Http\Controllers\ListController::class, 'index'])->name('listindex');
        Route::get('/profile', [App\Http\Controllers\Auth\ProfileController::class,'index'])->name('profile');
        Route::get('/editprofile', function () {return view('auth.edit-profile');})->name('editprofile');
        Route::get('/search', function () {return view('search');})->name('search');
    });

    Route::group(['GET'], function () {
        Route::get('/check-movie/{tmdb_id}', [App\Http\Controllers\MovieController::class, 'checkMovieExists']);
        Route::get('/insert/{tmdb_id}', [App\Http\Controllers\MovieController::class, 'insert']);

        Route::get('/delete/{tmdb_id}', [App\Http\Controllers\MovieController::class, 'delete']);
    });

    Route::group(['POST'], function () {
        Route::post('/editprofile-post', [App\Http\Controllers\Auth\ProfileController::class, 'editprofile'])->name('editprofile-post');
    });

});

Route::group(['google'], function () {
    Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'signInwithGoogle']);
    Route::get('callback/google', [App\Http\Controllers\GoogleController::class, 'callbackToGoogle'])->name('callbackToGoogle');
});
