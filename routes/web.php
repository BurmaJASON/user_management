<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserLogController;
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

Route::middleware(['guest'])->group(function(){
    Route::redirect('/','register');
    Route::get('register',function() {
        return view('auth.register');
    })->name('register');
    Route::post('register',[AuthController::class,'register'])->name('register');
    Route::get('login',function() {
        return view('auth.login');
    })->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login');
});


Route::middleware(['auth'])->group(function() {
    Route::get('dashboard',[AuthController::class,'index'])->name('dashboard');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');

    // profile
    Route::get('changePassword',[ProfileController::class, 'passwordPage'])->name('password#page');
    Route::put('changePassword',[ProfileController::class, 'changePassword'])->name('password#change');
    Route::resource('profile', ProfileController::class);

    // users
    Route::resource('user',UserController::class);

    // logs
    Route::get('log',[UserLogController::class,'index'])->name('log.index');
});
