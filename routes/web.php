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

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('question')->middleware(['auth'])->group(function () {

    Route::get('/view', 'QuestionController@index')->name('questions.view');
    
    Route::get('/add', 'QuestionController@add')->name('questions.ask');
    Route::post('/add', 'QuestionController@addQuestion')->name('questions.add');

    Route::get('/explain/{id}', 'QuestionController@questionExplain')->name('question.explain');
    Route::post('/select', 'QuestionController@questionSelect')->name('question.select');
    Route::post('/reset', 'QuestionController@questionReset')->name('question.select.reset');

    Route::get('/generatepdf', 'PdfController@generateQuestions')->name('question.pdf');
});
Auth::routes();

