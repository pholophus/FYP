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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/subjects/create', 'SubjectController@create');
Route::post('/subjects', 'SubjectController@store');
Route::get('/subjects/{subject}', 'SubjectController@show');
Route::get('/subjects/{subject}/edit', 'SubjectController@edit');
Route::patch('/subjects/{subject}', 'SubjectController@update');
Route::delete('/subjects/{subject}','SubjectController@destroy');

Route::get('/chapters/{subject}', 'ChapterController@index')->name('chapter');
Route::get('/chapters/{subject}/create', 'ChapterController@create');
Route::post('/chapters/{subject}', 'ChapterController@store');
Route::get('chapters/{chapter}', 'ChapterController@show');
Route::get('/chapters/{chapter}/edit', 'ChapterController@edit');
Route::patch('/chapters/{chapter}', 'ChapterController@update');
Route::delete('/chapters/{chapter}','ChapterController@destroy');


