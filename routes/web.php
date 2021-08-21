<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users')->name('users');
Route::get('/addUser', 'HomeController@addUser')->name('addUser');
Route::post('/addNewUser', 'HomeController@addNewUser')->name('addNewUser');
Route::get('deleteUser/{id}', 'HomeController@deleteUser')->name('deleteUser');
Route::get('editUser/{id}', 'HomeController@editUser')->name('editUser');
Route::post('updateUser/{id}', 'HomeController@updateUser')->name('updateUser');

//artcles
Route::resource('articles', 'ArticleController');
