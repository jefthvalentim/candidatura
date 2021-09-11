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
    return redirect(route('home'));
});


Auth::routes();

Route::get('/', 'SiteController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/portfolios', 'PortfolioController@index')->name('portfolio.index')->middleware('auth');
Route::get('/portfolio', 'PortfolioController@create')->name('portfolio.create')->middleware('auth');
Route::get('/portfolio/show/{portfolio}', 'PortfolioController@show')->name('portfolio.show')->middleware('auth');
Route::get('/portfolio/edit/{portfolio}', 'PortfolioController@edit')->name('portfolio.edit')->middleware('auth');
Route::post('/portfolio', 'PortfolioController@store')->name('portfolio.store')->middleware('auth');
Route::post('/portfolio/update/{portfolio}', 'PortfolioController@update')->name('portfolio.update')->middleware('auth');
Route::put('/portfolio/highlight/{portfolio}', 'PortfolioController@highlight')->name('portfolio.highlight')->middleware('auth');
Route::post('/portfolio/gallery/{portfolio}', 'PortfolioController@storeGallery')->name('portfolio.gallery.store')->middleware('auth');
Route::delete('/portfolio/{portfolio}', 'PortfolioController@destroy')->name('portfolio.destroy')->middleware('auth');
Route::delete('/portfolio/gallery/{gallery}', 'PortfolioController@galleryDestroy')->name('portfolio.gallery.destroy')->middleware('auth');
Route::get('/messages', 'ContactController@index')->name('message.index')->middleware('auth');
Route::get('/messages/read', 'ContactController@read')->name('message.read')->middleware('auth');
Route::get('/messages/not_read', 'ContactController@not_read')->name('message.not_read')->middleware('auth');
Route::put('/message/edit/{message}', 'ContactController@edit')->name('message.edit')->middleware('auth');
Route::delete('/message/delete/{message}', 'ContactController@destroy')->name('message.destroy')->middleware('auth');
Route::get('/settings', 'UserController@index')->name('setting.index')->middleware('auth');
Route::put('/settings', 'UserController@update')->name('setting.update')->middleware('auth');