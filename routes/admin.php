<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Auth\LoginController;
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


route::get('dashboard', 'admin\adminController@dashboard')->name('dashboard');
// start admin Login Routes 
route::prefix('admin')->group(function () {
    route::namespace('Auth\Admin')->group(function () {
        route::controller('LoginController')->group(function () {
                route::get('login', 'loginForm')->name('loginForm');
                route::post('login', 'checkAdmin')->name('loginCheck');
                // route::post('logout','Logout')->name('AdminLogout');
            
        });
    });
});
// end Admin login routes

// start admin register Routes 

route::prefix('admin')->group(function () {
    route::namespace('Auth\Admin')->group(function () {
        route::controller('registerController')->group(function () {
            route::get('register', 'registerForm')->name('registerForm');
            route::post('register', 'storeAdmin')->name('storeAdmin');
        });
    });
});

// end admin register Routes