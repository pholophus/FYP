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

Route::get('/chapters/{subject}', 'ChapterController@index');
Route::get('/chapters/{subject}/create', 'ChapterController@create');
Route::post('/chapters/{subject}', 'ChapterController@store');
Route::get('/chapters/{chapter}', 'ChapterController@show');
Route::get('/chapters/{chapter}/edit', 'ChapterController@edit');
Route::patch('/chapters/{chapter}', 'ChapterController@update');
Route::delete('/chapters/{chapter}','ChapterController@destroy');

Route::get('/questions/{subject}/subject', 'QuestionController@indexSubject');
Route::get('/questions/{chapter}/chapters', 'QuestionController@indexChapter');
Route::get('/questions/{subject}/create/subject', 'QuestionController@createSubject');
Route::get('/questions/{chapter}/create/chapters', 'QuestionController@createChapter');
Route::post('/questions/{subject}/subject', 'QuestionController@storeSubject');
Route::post('/questions/{chapter}/chapters', 'QuestionController@storeChapter');
Route::get('/questions/{question}/subject/show','QuestionController@showSubject');
Route::get('/questions/{question}/chapters/show','QuestionController@showChapter');
Route::get('/questions/{question}/edit/subject','QuestionController@editSubject');
Route::get('/questions/{question}/edit/chapters','QuestionController@editChapter');
Route::patch('/questions/{question}/subject','QuestionController@updateSubject');
Route::patch('/questions/{question}/chapters','QuestionController@updateChapter');
Route::delete('/questions/{question}/subject','QuestionController@destroySubject');
Route::delete('/questions/{question}/chapters','QuestionController@destroyChapter');

Route::get('/exams/{subject}','ExamController@index');
Route::get('/exams/{subject}/create', 'ExamController@create');
Route::get('/exams/{subject}/requirement', 'ExamController@requirement');
Route::post('/exams/{subject}/generate', 'ExamController@generate');
Route::post('/exams/{subject}/product', 'ExamController@product');
Route::post('/exams/{subject}/store', 'ExamController@store');
Route::get('/generate-docx/{exam}', 'ExamController@word');
Route::get('/exams/{exam}/show','ExamController@show');
Route::delete('/exams/{exam}','ExamController@destroy');