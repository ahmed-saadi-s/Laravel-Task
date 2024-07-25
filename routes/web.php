<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\AdController;


Route::controller(UserController::class)->group(function () {
    Route::get('/register', 'registerIndex');
    Route::post('/register', 'register')->name('register');

    Route::get('/login', 'loginIndex');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/cities/{country_id}','getCitiesByCountry');



    Route::get('/', 'home');

});

Route::get('/ads', [AdController::class, 'adsIndex'])->name('ads-home');


Route::middleware(['auth'])->group(function () {
    Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('edit-profile');
    Route::put('/edit-profile', [UserController::class, 'updateProfile']);
    Route::get('/create-ad', [AdController::class, 'createAdIndex'])->name('ads.create');
    Route::post('/store-ad', [AdController::class, 'store'])->name('ads.store');
    Route::get('/ads/{id}', [AdController::class, 'show'])->name('ads.show');
    Route::get('/user/{id}', [UserController::class, 'viewProfile'])->name('user.profile');

});
