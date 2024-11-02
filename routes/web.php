<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::post('/publications/{publication}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

Route::get('/profiles/{profile}/follow', [FollowController::class, 'follow'])->middleware('auth')->name('follow');
Route::get('/profiles/{profile}/unfollow', [FollowController::class, 'unfollow'])->middleware('auth')->name('unfollow');

Route::get('/publications/{publication}/like', [LikeController::class, 'like'])->middleware('auth')->name('like');
Route::get('/publications/{publication}/dislike', [LikeController::class, 'dislike'])->middleware('auth')->name('dislike');

Route::resource('profiles',ProfileController::class);
Route::resource('publications',PublicationController::class);


Route::get('/',[homecontroller::class ,'index'])->name('homepage');
Route::middleware('guest')->group(function(){
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/settings',[InformationsController::class ,'index'])->name('settings.index');

