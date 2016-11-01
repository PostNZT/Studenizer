<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome_page');

Route::get('/student',function(){
    return view('student');
})->name('student_page');
