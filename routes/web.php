<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/app', function () {
    return view('index');
});

Route::post('/add-income', 'AppController@addIncome');
Route::get('/get-income', 'AppController@getIncome');

Route::post('/add-expense', 'AppController@addExpense');
Route::get('/get-expense', 'AppController@getExpense');

Route::post('/update-summary', 'AppController@updateSummary');
Route::get('/get-summary', 'AppController@getSummary');
