<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','UserController@register');
Route::post('login','UserController@login');
Route::get('profile','UserController@getAuthenticatedUser');


Route::get('event','EventController@index');
Route::get('event/{id}','EventController@show');
Route::post('event','EventController@store');
Route::put('event/{id}','EventController@update');
Route::delete('event/{id}','EventController@delete');

Route::post('image','ImageController@store');

Route::get('glide/{path}', function($path){
    $server = \League\Glide\ServerFactory::create([
        'source' => app('filesystem')->disk('public')->getDriver(),
    'cache' => storage_path('glide'),
    ]);
    return $server->getImageResponse($path, Input::query());
})->where('path', '.+');