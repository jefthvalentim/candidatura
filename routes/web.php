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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'CandidaturaController@create')->name('candidatura.create');
Route::post('/', 'CandidaturaController@store')->name('candidatura.store');
Route::get('/candidaturas', 'CandidaturaController@index')->name('candidatura.index');
Route::get('/candidaturas/{candidatura}', 'CandidaturaController@destroy')->name('candidatura.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
