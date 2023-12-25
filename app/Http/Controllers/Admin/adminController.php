<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

   public function __construct()
{
    $this->middleware('adminAuth:admin')->only('dashboard');
    $this->middleware('guest:admin')->only(['loginForm','registerForm']);
}
    
    public function dashboard(){
        return view ('admin');
    }
    public function loginForm(){
        return view ('test.adminLoginForm');
    }
    public function checkAdmin(request $request){  
        // dd($request) ;     
        $request->validate([
            'email'=>'required | string',
            'password'=>'required | string ',
        ]);
        
        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->remember)){
            return redirect()->to($this->redirectTo);
        }
        else
        return redirect()->back()->withInput(['email'=>$request->email])->with(['error'=>'somthing went wrong']);
    }

    public function registerForm(){
        return view ('test.adminRegisterForm');
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

    public function Logout(Request $request)
    {

        Auth::guard('admin')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('loginForm');
       
    }
    

}
