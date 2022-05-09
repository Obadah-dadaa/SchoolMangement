<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//auth route
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

// for users
//Route::group(['middleware' => ['auth', 'role:system_administrator']], function() {
//    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
//});






//Students Routes
//Route::resource('/parents', 'App\Http\Controllers\ParentController');
//Route::resource('/students', 'App\Http\Controllers\StudentController');
Route::get('/students','App\Http\Controllers\StudentController@index')->name('students');
Route::get('/students/create','App\Http\Controllers\StudentController@create')->name('students.create');
Route::post('/students/store','App\Http\Controllers\StudentController@store')->name('students.store');
Route::post('/students/update{id}','App\Http\Controllers\StudentController@update')->name('students.update');
Route::get('/students/show/{id}', 'App\Http\Controllers\StudentController@show')->name('students.show');
Route::get('/students/edit/{id}','App\Http\Controllers\StudentController@edit')->name('students.edit');
Route::get('/students/delete/{id}','App\Http\Controllers\StudentController@destroy')->name('students.destroy');






//Teacher Routes
//Route::resource('/teachers', 'App\Http\Controllers\TeacherController');

Route::get('/teachers','App\Http\Controllers\TeacherController@index')->name('teachers');
Route::get('/teachers/create','App\Http\Controllers\TeacherController@create')->name('teachers.create');
Route::post('/teachers/store','App\Http\Controllers\TeacherController@store')->name('teachers.store');
Route::post('/teachers/update{id}','App\Http\Controllers\TeacherController@update')->name('teachers.update');
Route::get('/teachers/show/{id}', 'App\Http\Controllers\TeacherController@show')->name('teachers.show');
Route::get('/teachers/edit/{id}','App\Http\Controllers\TeacherController@edit')->name('teachers.edit');
Route::get('/teachers/delete/{id}','App\Http\Controllers\TeacherController@destroy')->name('teachers.destroy');





//Users Routes
//Route::resource('/users', 'App\Http\Controllers\UsersController');

Route::group(['middleware' => ['auth', 'role:system_administrator']], function() {

    Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users');;
    Route::post('/users/store', 'App\Http\Controllers\UsersController@store')->name('users.store');;;
    Route::post('/users/update{id}', 'App\Http\Controllers\UsersController@update')->name('users.update');;;
    Route::get('/users/create', 'App\Http\Controllers\UsersController@create')->name('users.create');;
    Route::get('/users/edit/{id}', 'App\Http\Controllers\UsersController@edit')->name('users.edit');
    Route::get('/users/show/{id}', 'App\Http\Controllers\UsersController@show')->name('users.show');
    Route::get('/users/delete/{id}', 'App\Http\Controllers\UsersController@destroy')->name('users.destroy');


});
