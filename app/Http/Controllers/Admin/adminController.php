<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class adminController extends Controller
{
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

   public function __construct()
{
    $this->middleware('adminAuth:admin')->only('dashboard');
    
}
    
    public function dashboard(){
        return view ('admin');
    }

}
