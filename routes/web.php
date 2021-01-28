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

Route::get('/', function ()
{
	if (Auth::user())
    {
    	return redirect('/bio-data');
    }
    else
    {
    	return view('auth.login');
    }
});

Auth::routes([
    'reset'    => false, 
    'register' => false
]);

Route::match(['get', 'post'], '/register', 'Auth\RegisterController@register');

Route::prefix('/master-data')->group(function()
{
    Route::get('/users', 'Panel\MasterData\UsersController@index');
    Route::match(['get', 'post'], '/users/create', 'Panel\MasterData\UsersController@create');
    Route::match(['get', 'post'], '/users/update/{id}', 'Panel\MasterData\UsersController@update');
});

Route::prefix('/bio-data')->group(function()
{
    Route::get('/', 'Panel\BioData\BioDataController@index');
    Route::get('/view/{id}', 'Panel\BioData\BioDataController@view');
    Route::match(['get', 'post'], '/create', 'Panel\BioData\BioDataController@create');
    Route::match(['get', 'post'], '/update/{id}', 'Panel\BioData\BioDataController@update');
});

Route::prefix('/setting')->group(function ()
{
    Route::match(['get', 'post'], '/change-password', 'Panel\Setting\ProfileController@index');
});