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
Route::get('/portfolios', 'SiteController@index');
Route::post('/send-form', 'SiteController@sendForm');
Route::post('/portfolios/change-order', 'PortfolioController@changeOrder');

/* use Illuminate\Support\Facades\File;

File::link(storage_path('app/public'), public_path('storage')); */
/* 
<?php     $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';     $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';     symlink($targetFolder,$linkFolder);     echo 'Symlink process successfully completed'; ?> */