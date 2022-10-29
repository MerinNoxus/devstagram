<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {   
    return view('principal');
});
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);
/* Route::get('/auntenticar',[RegisterController::class, 'auntenticar']); */
Route::get('/login',[LoginController::class,'index'])->name('login');
//store sirve para almacenar informacion
Route::post('/login',[LoginController::class,'store']);
Route::get('/muro',[PostController::class,'index'])->name('posts.index');

