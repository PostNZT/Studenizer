<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome_page');

Route::get('/student',function() {
    return view('student');
})->name('student_page');

Route::get('/charts/population',function() {
  return view('chart');
})->name('chart_page_population');

Route::get('/charts/program_cluster',function() {
    return view('chart');
})->name('chart_page_program_cluster');

Route::get('/charts/cgpa_cluster',function() {
  return view('chart');
})->name('chart_page_cgpa_cluster');

Route::get('/student/add', function() {
  return view('add_student');
})->name('add_student');
