<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // read session
    // get session details from database
    // get user using user id from database
    return view('welcome');
});


Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function(){
    Route::post('/item/{book_id}', 'addItem')->name('add');
    Route::get('/', 'index')->name('index');
    Route::delete('/{book_id}', 'removeItem')->name('remove');
});
