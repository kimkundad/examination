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
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT');
header("Access-Control-Allow-Headers: Authorization, X-Requested-With,  Content-Type, Accept");


Auth::routes(['verify' => true]);
Route::auth();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('index');
Route::get('/', 'HomeController@index')->name('index');


Route::get('/admin_order', 'DashboardController@admin_order')->name('admin_order');
Route::get('/get_data_order/{id}', 'DashboardController@get_data_order')->name('get_data_order');


Route::get('/admin/api_edit_order/{id}', 'DashboardController@edit_order')->name('edit_order');

Route::post('/api/post_edit_order/{id}', 'DashboardController@post_edit_order')->name('post_edit_order');
Route::post('/api/add_my_order2', 'DashboardController@add_my_order2')->name('add_my_order2');


Route::post('/api/add_my_contact', 'ApiController@add_my_contact')->name('add_my_contact');

Route::get('/answer/{id}', 'HomeController@answer')->name('answer');

Route::get('/start_exam/{id}', 'HomeController@start_exam')->name('start_exam');

Route::post('/search_category', 'HomeController@search_category')->name('search_category');
Route::get('/category/{id}', 'HomeController@category')->name('category');

Route::get('/payment/{id}', 'HomeController@payment')->name('payment');
Route::get('/payment', 'HomeController@payment2')->name('payment2');
Route::post('post_confirm_payment', 'HomeController@post_confirm_payment');
Route::get('/reportExam/{id}', 'HomeController@reportExam')->name('reportExam');

Route::get('confirm_payment_success/{id}', 'HomeController@confirm_payment_success');

Route::get('/about_us', 'HomeController@about')->name('about');

Route::get('/contact_us', 'HomeController@contact')->name('contact');

Route::post('/post_ans_course','HomeController@post_ans_course2');

Route::get('/examination', 'HomeController@examinations')->name('examinations');

Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacy_policy', 'HomeController@privacy_policy')->name('privacy_policy');

Route::get('/check_doExam/{id}', 'ApiController@check_doExam')->name('check_doExam');


Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {

  Route::get('/history', 'ProfileController@history')->name('history');
  Route::get('/buy_history', 'ProfileController@buy_history')->name('buy_history');

  Route::get('/my_examination', 'ProfileController@my_examination')->name('my_examination');
  
  Route::get('/accounts', 'ProfileController@accounts')->name('accounts');
  Route::post('api/add_profile','ProfileController@add_profile');

  Route::get('/doExam/{id}', 'HomeController@doExam')->name('doExam');
  Route::get('/buy_doExam/{id}', 'ApiController@buy_doExam')->name('buy_doExam');

  Route::get('/get_myorder/{id}', 'DoExamController@get_myorder')->name('get_myorder');
  
  Route::post('/api/add_my_order', 'ApiController@add_my_order')->name('add_my_order');
  
  });

Route::group(['middleware' => ['UserRole:manager|employee']], function() {

  Route::get('admin/dashboard', 'DashboardController@index')->name('index');
  Route::get('admin/del_myorder', 'ExampleController@del_myorder')->name('del_myorder');

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

