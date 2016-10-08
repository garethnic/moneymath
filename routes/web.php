<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/app', 'AppController@showApp');
Route::get('/contact', 'HomeController@showContact');

Route::post('/add-income', 'AppController@addIncome');
Route::get('/get-income', 'AppController@getIncome');
Route::post('/remove-income', 'AppController@deleteIncome');

Route::post('/add-expense', 'AppController@addExpense');
Route::get('/get-expense', 'AppController@getExpense');
Route::post('/remove-expense', 'AppController@deleteExpense');

Route::post('/update-summary', 'AppController@updateSummary');
Route::get('/get-summary', 'AppController@getSummary');
