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

Route::get('fournisseur/{id}','FournisseurController@get_provider');
Route::post('fournisseur','FournisseurController@create');
Route::delete('fournisseur/{id}','FournisseurController@destroy');

Route::post('colis','ColisController@create');
Route::get('colis','ColisController@get_colis');
Route::get('allcolis','ColisController@get_all_colis');
Route::delete('colis','ColisController@destroy');





