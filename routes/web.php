<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/app', function () {
    return view('index');
});
