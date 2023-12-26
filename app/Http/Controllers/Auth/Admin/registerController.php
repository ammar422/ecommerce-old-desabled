<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    public function __construct()
    {

        $this->middleware('guest:admin')->only(['loginForm', 'registerForm']);
    }

    public function registerForm()
    {
        return view('auth.admin.adminRegisterForm');
    }
    public function storeAdmin(AuthRequest $request)
    {
        $admenKey = 'code110';
        if ($admenKey !== $request->adminKey) {
            return redirect()->back()->with(['error' => 'admin Key is not valid']);
        } else
            $data = $request->except('adminKey', 'password_confirmation');
        $data['password'] = Hash::make($request->password);
        Admin::create($data);
        return redirect()->back()->with(['success' => 'admin data regestred successfuly']);
    }
}
