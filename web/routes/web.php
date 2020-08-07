<?php

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
Route::get('/dashboard', function () {
    return view('welcome');
    //
});
Route::group(['middleware' => ['auth','admin']], function() {
Route::post('/store', 'ProfileController@store')->name('store');
Route::get('/test/{id}', 'InqueryController@test')->name('test');
Route::get('status/{id}', 'InqueryController@statusChange')->name('inquery.status');
Route::resource('inquery', 'InqueryController');
Route::get('/home', 'HomeController@index')->name('home');

});
Auth::routes();
Route::resource('agent', 'LoginController');
Route::resource('registration', 'RegisterationController');
Route::resource('profile', 'ProfileController');



