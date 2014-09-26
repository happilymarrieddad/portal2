<?php

// Home Routes
Route::get('/', 'HomeController@index');
Route::resource('home', 'HomeController', ['only'=>['index']]);
Route::resource('about', 'AboutController', ['only'=>['index']]);


// Army Routes
Route::resource('beastmen',  'BeastmenController',      ['only'=>['index']]);
Route::resource('bretonnia', 'BretonniaController',     ['only'=>['index']]);
Route::resource('chaos',     'ChaosWarriorsController', ['only'=>['index']]);
Route::resource('darkelves', 'DarkElvesController',     ['only'=>['index']]);
Route::resource('daemons',   'DaemonsController',       ['only'=>['index']]);
Route::resource('dwarfs',    'DwarfsController',        ['only'=>['index']]);
Route::resource('highelves', 'HighElvesController',     ['only'=>['index']]);
Route::resource('lizardmen', 'LizardmenController',     ['only'=>['index']]);
Route::resource('ogre',      'OgreKingdomsController',  ['only'=>['index']]);
Route::resource('orcsgobs',  'OrcsGoblinsController',   ['only'=>['index']]);
Route::resource('skaven',    'SkavenController',        ['only'=>['index']]);
Route::resource('empire',    'TheEmpireController',     ['only'=>['index']]);
Route::resource('tombkings', 'TombKingsController',     ['only'=>['index']]);
Route::resource('vampires',  'VampireCountsController', ['only'=>['index']]);
Route::resource('woodelves', 'WoodElvesController',     ['only'=>['index']]);



// User Routes
Route::get('/logout', 'SessionController@logout');
Route::resource('session', 'SessionController', ['only'=>['create', 'store', 'destroy']]);
Route::get('/profile/show', 'UserController@show');
Route::get('/profile/edit', 'UserController@edit');
Route::get('/profile/password', 'PasswordController@edit');
Route::post('/profile/passUpdate', 'PasswordController@update');
Route::resource('user', 'UserController');
Route::resource('admin', 'AdminController', ['only'=>['index']]);

// Catches any missing routes the user decides to try
App::missing(function() {
    return Redirect::to('/');
});
