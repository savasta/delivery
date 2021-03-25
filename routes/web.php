<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('Dashboard/dashboard');
});




Route::get('/createdcolis', 'ColisController@get_created_colis');
Route::get('/management/colis', function () {return view('Dashboard/gestioncolis');});
Route::get('/importexcel', function () {return view('Dashboard/importexcel');});
Route::get('guideuser', function () {return view('Dashboard/guideutulisateur');});



Route::get('/icons', function () {
    return view('Dashboard/icons');
});

Route::get('/user', function () {
    return view('Dashboard/user');
});

Route::get('/createcolis', function() {
    return view('Dashboard/createcolis');
});

Route::get("colisform","ColisController@form")->name('createcolis');
Route::get("testmodal","ColisController@test")->name('testmodall');

Route::post("/import_excel/import","ImportExcelController@import");




