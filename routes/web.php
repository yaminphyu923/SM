<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {

// });

Route::middleware('UserAuth')->group(function(){

    Route::get('/',[AuthController::class,'loginPage'])->name('loginPage');

    Route::post('/login',[AuthController::class,'login'])->name('login');

    Route::get('/register',[AuthController::class,'registerPage'])->name('registerPage');

    Route::post('/register',[AuthController::class,'register'])->name('register');

    Route::post('/logout',[AuthController::class,'destroy'])->name('logout');

    Route::middleware('Auth')->group(function(){

    Route::get('/home',[HomeController::class,'home'])->name('home');

    Route::get('/profile',[HomeController::class,'profile'])->name('profile');

    Route::get('/homeDetail/{post_id}',[HomeController::class,'homeDetail'])->name('homeDetail');

    Route::resource('/posts',PostController::class);

    Route::get('/commentPage/{post_id}',[PostController::class,'commentPage'])->name('commentPage');

    Route::resource('/comments',CommentController::class);

    });
});
