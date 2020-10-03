<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::auth();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('index');
Route::get('/', 'HomeController@index')->name('index');

Route::get('/answer/{id}', 'HomeController@answer')->name('answer');

Route::get('/start_exam/{id}', 'HomeController@start_exam')->name('start_exam');

Route::post('/search_category', 'HomeController@search_category')->name('search_category');
Route::get('/category/{id}', 'HomeController@category')->name('category');

Route::get('/doExam/{id}', 'HomeController@doExam')->name('doExam');

Route::get('/reportExam/{id}', 'HomeController@reportExam')->name('reportExam');

Route::get('/about_us', 'HomeController@about')->name('about');

Route::get('/contact_us', 'HomeController@contact')->name('contact');

Route::post('/post_ans_course','HomeController@post_ans_course2');

Route::get('/examination', 'HomeController@examinations')->name('examinations');

Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacy_policy', 'HomeController@privacy_policy')->name('privacy_policy');


Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {

  Route::get('/history', 'ProfileController@history')->name('history');
  Route::get('/accounts', 'ProfileController@accounts')->name('accounts');
  Route::post('api/add_profile','ProfileController@add_profile');

  });

Route::group(['middleware' => ['UserRole:manager|employee']], function() {

  Route::get('admin/dashboard', 'DashboardController@index')->name('index');
  Route::resource('admin/users', 'UsersController');
  Route::resource('admin/category', 'CategoryController');
  Route::get('del/cat_id/{id}', 'CategoryController@del_cat')->name('home');

  Route::get('admin/example', 'ExampleController@index')->name('index');
  Route::get('admin/example/create', 'ExampleController@create')->name('create');

  Route::get('admin/example/{id}/show', 'ExampleController@show')->name('show');

  Route::post('api/add_example/', 'ExampleController@add_example')->name('add_example');

  Route::post('api/post_edit_example/{id}', 'ExampleController@post_edit_example')->name('post_edit_example');

  Route::get('admin/edit_example/{id}/edit', 'ExampleController@edit')->name('edit');
  Route::get('del/example/{id}', 'ExampleController@del_example')->name('del_example');

  Route::post('admin/add_question', 'ExampleController@add_question')->name('add_question');

  Route::post('admin/updatesort/{id}', 'ExampleController@updatesort')->name('updatesort');

  });

