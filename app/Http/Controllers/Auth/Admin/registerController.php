<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

   public function __construct()
{
   
    $this->middleware('guest:admin')->only(['loginForm','registerForm']);
}
  
    public function registerForm(){
        return view ('auth.admin.adminRegisterForm');
    }
    public function storeAdmin(request $request){
        // dd($request);
        $admenKey='code110';
        if($admenKey!==$request->adminKey){
            return redirect()->back()->with(['error'=>'admin Key is not valid']);
        }else
        $request->validate([
            'adminKey'=>'required | string',
            'name'=>'required |string | max:100',
            'email'=>'required |string',
            'phone'=>'required | max:11',
            'password'=>'required | string | confirmed',
            'password_confirmation'=>'required | string '

        ]);
        $data=$request->except('adminKey','password_confirmation');
        $data['password']=Hash::make($request->password);
        Admin::create($data);
        return redirect()->back()->with(['success'=>'admin data regestred successfuly']);
        
    }


}
