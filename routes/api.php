<?php

use Illuminate\Http\Request;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['guest'])->group(function () {
  Route::post('register', 'AuthenticateController@register');
  Route::post('login', 'AuthenticateController@login');
});

Route::post('refresh-token', 'AuthenticateController@refreshToken');

Route::middleware(['jwt.auth'])->group(function () {
  Route::post('logout', 'AuthenticateController@logout');

  Route::get('reproductores', 'ReproductorController@index');
  Route::get('reproductores/{id}', 'ReproductorController@show');
  Route::post('save', 'ReproductorController@store');
  Route::get('hemInse', 'ReproductorController@hembraInseminaciones');

  Route::resource('notes', 'NotesController');

});

