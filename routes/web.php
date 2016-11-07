<?php

Route::get('/', function ()
{
    if(Auth::check())
    {
      return view('student');
    }
    return view('welcome');
})->name('welcome_page');

Route::get('/student',function()
{
    return view('student');
})->name('student_page');

Route::get('/charts/population',function()
{
    return view('chart');
})->name('chart_page_population');

Route::get('/charts/program_cluster',function()
{
    return view('chart');
})->name('chart_page_program_cluster');

Route::get('/charts/cgpa_cluster',function()
{
    return view('chart');
})->name('chart_page_cgpa_cluster');

Route::get('/student/add', function()
{
    return view('add_student');
})->name('add_student');

Route::get('/student/add/file', function()
{
    return view('add_student');
})->name('add_student_file');

Route::get('/admin/register',function()
{
    return view('admin_register');
})->name('admin_register');

Route::post('/admin/register',
[
    'uses' => 'UserController@postSignup',
    'as' => 'admin_register_post'
]);

Route::post('/',
[
    'uses' => 'UserController@postSignIn',
    'as' => 'signIn'
]);

Route::get('/logout',
[
    'uses' => 'UserController@getLogout',
    'as' => 'logout',
    'middleware'=>'auth'
]);

Route::post('/student/add',
[
  'uses' => 'StudentController@postAddStudent',
  'as' => 'add_student_post'
]);

Route::post('/student/add/file',
[
    'uses' => 'StudentController@postAddBulkStudent',
    'as' => 'add_student_bulk'
]);

Route::get('/student/view/all',[
  'uses' => 'StudentController@getViewStudentList',
  'as' => 'view_all_student'
]);


