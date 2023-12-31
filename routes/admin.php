<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/


route::group(['prefix' => 'admin'], function () {
    route::group(['middleware' => 'auth:admin'], function () {
        route::namespace('Auth\Admin')->group(function () {
            route::get('dashboard', 'LoginController@dashboard')->name('dashboard');
            route::post('logout', 'LoginController@logout')->name('adminLogout');
        });

        // begin languages routes 
        route::group(['prefix' => 'languages', 'namespace'=>'Admin'], function () {
            route::get('ShowAllLangs','LanguagesController@ShowAllLangs')->name('ShowAllLangs');
            route::get('addAllLangs','LanguagesController@addAllLangs')->name('addAllLangs');
            route::post('addAllLangs','LanguagesController@stroeLanguage')->name('stroeLanguage');

        });
        // begin languages routes 

    });

    route::group(['middleware' => 'guest:admin'], function () {
        route::namespace('Auth\Admin')->group(function () {
            route::get('login', 'LoginController@loginForm')->name('loginForm');
            route::post('login', 'LoginController@checkAdmin')->name('loginCheck');
        });
    });
});
