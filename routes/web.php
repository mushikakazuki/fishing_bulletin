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
    // Route::get('show/{id}','ContactFormController@show')->name('contact.show');
    // Route::get('edit/{id}','ContactFormController@edit')->name('contact.edit');
    // Route::post('update/{id}','ContactFormController@update')->name('contact.update');
    Route::post('destroy/{id}','FishingController@destroy')->name('fishing.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
