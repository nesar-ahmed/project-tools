<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('project', 'ProjectController');

Route::resource('requirement', 'RequirementController')->except([
    'index', 'create'
]);
Route::resource('task', 'TaskController');

Route::resource('people', 'PeopleController');

Route::resource('meeting', 'MeetingController');
