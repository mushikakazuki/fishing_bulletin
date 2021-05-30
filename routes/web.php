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

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('fishing.fishing_top');
});

Route::get('fishing/index/', 'FishingController@index')->name('fishing.index');

Route::group(['prefix' => "fishing", 'middleware' => "auth"], function() {
    Route::get('create','FishingController@create')->name('Fishing.create');
    Route::post('store','FishingController@store')->name('Fishing.store');
    Route::get('show/{id}','FishingController@show')->name('Fishing.show');
    Route::post('destroy/{id}','FishingController@destroy')->name('fishing.destroy');
    Route::post('content_update/{id}','FishingController@content_update')->name('fishing.content_update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
