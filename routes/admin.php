<?php

use App\Http\Controllers\Admin\adminController;
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
route::get('home', function () {
    return view('home');
})->name('homeNew')->middleware('adminAuth:admin');



route::get('dashboard', 'admin\adminController@dashboard')->name('dashboard');
route::prefix('admin')->group(function () {
    route::namespace('admin')->group(function () {
        route::controller('adminController')->group(function(){
            
            route::get('login','loginForm')->name('loginForm');
            route::post('login','checkAdmin')->name('loginCheck');
            route::get('register','registerForm')->name('registerForm');
            route::post('register','storeAdmin')->name('storeAdmin');
            // route::post('logout','Logout')->name('AdminLogout');
        });
       
    });
});

