<?php

use Illuminate\Http\Request;

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


Route::get('v1/category', 'Api\v1\CategoryController@index');
Route::get('v1/profile/{profile}', 'Api\v1\ProfileController@index');
Route::put('v1/profile/{profile}/update', 'Api\v1\ProfileController@update');
Route::get('v1/recentproperty', 'Api\v1\PropertyController@recentproperty');
Route::get('v1/property/{property}/detail','Api\v1\PropertyController@detail');
Route::get('v1/propertiesbycategory/{category}','Api\v1\PropertyController@propertyByCategory');
Route::post('v1/register','Api\v1\RegisterController@create');
