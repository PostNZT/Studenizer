<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome_page');

Route::get('/home',function(){
    return view('home');
})->name('home_page');
