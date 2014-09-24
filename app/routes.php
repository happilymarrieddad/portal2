<?php

// Home Routes
Route::get('/', 'HomeController@index');
Route::resource('home', 'HomeController', ['only'=>['index']]);










// User Routes
Route::get('/logout', 'SessionController@logout');
Route::resource('session', 'SessionController', ['only'=>['create', 'store', 'destroy']]);
Route::resource('user', 'UserController', ['only'=> ['create', 'store', 'destroy']]);

// Catches any missing routes the user decides to try
App::missing(function() {
    return Redirect::to('/');
});
