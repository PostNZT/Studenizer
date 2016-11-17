<?php

Route::get('/', function ()
{
    if(Auth::check())
    return view('student');

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
  if(Auth::check())
  return view('add_student');

  return redirect()
          ->route('welcome_page')
          ->with(['message'=>'please login to add a student']);

})->name('add_student');

Route::get('/student/add/file', function()
{
   if(Auth::check())
      return view('add_student');

      return redirect()
             ->route('welcome_page')
             ->with(['message'=>'please login to add a student']);

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

Route::get('/student/gender/count',[
    'uses' => 'StudentController@getGenderPopulation',
    'as' => 'gender_population'
]);

Route::get('/student/muslim/count',[
    'uses' => 'StudentController@getMuslimPopulation',
    'as' => 'muslim_population'
]);

Route::get('/student/admit_types',[
    'uses' => 'StaticDataController@getAdmitTypes',
    'as' => 'admit_types'
]);

Route::get('/student/term_types',[
    'uses' => 'StaticDataController@getTermTypes',
    'as' => 'term_types'
]);

Route::get('/student/scholarhip_list',[
    'uses' => 'StaticDataController@getScholarshipList',
    'as' => 'scholarship_list'
]);

Route::get('/student/programs',[
    'uses' => 'StaticDataController@getProgramList',
    'as' => 'program_list'
]);

Route::get('/student/program/population' , [
    'uses' => 'StudentController@getCoursePopulation',
    'as' => 'course_population'
]);

Route::get('/student/population', [
    'uses' => 'StudentController@getStudentPopulation',
    'as' => 'student_population'
]);

Route::get('/student/search', [
     'uses' => 'StudentController@searchStudent',
     'as'   => 'student_search'
]);

Route::get('/students/cluster/cgpa', [
     'uses' => 'StudentController@getProgramClusterDistribution',
     'as' => 'cluster_cgpa'
]);

Route::get('/cgpa/category',[
     'uses' => 'StaticDataController@getCGPACategory',
     'as' => 'cgpa_category'
]);

Route::get('/cgpa/cluster/count',[
    'uses' => 'StudentController@getCGPAClusterDistribution',
    'as' => 'cgpa_cluster_count'
]);

Route::get('/cgpa/category/distribution',[
  'uses' => 'StudentController@getCGPAClusterPopulationDistribution',
  'as' => 'cgpa_cluster_pop_count'
]);


Route::get('/dashboard', function()
{
    if(Auth::check())
    return view('dashboard');

    return redirect()
           ->route('welcome_page')
           ->with(['message'=>'please login to access the dashboard']);

})->name('dashboard');
