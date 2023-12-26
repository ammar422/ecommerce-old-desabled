@extends('layouts.admin.loginLayout')
@section('tittle', 'Admin Login')
@section('content')

    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('admin/adminLogin/images/bg-01.jpg') }}');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w" method="post" action="{{ route('loginCheck') }}">
                    @csrf
                    <span class="login100-form-title p-b-53">
                        Sign In With
                    </span>

                    <a href="#" class="btn-face m-b-20">
                        <i class="fa fa-facebook-official"></i>
                        Facebook
                    </a>

                    <a href="#" class="btn-google m-b-20">
                        <img src="{{ asset('admin/adminLogin/images/icons/icon-google.png') }}" alt="GOOGLE">
                        Google
                    </a>

                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Email
                        </span>
                    </div>
                    <div class="wrap-input100 ">
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email">
                        <span class="focus-input100"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password
                        </span>
                        <a href="#" class="txt2 bo1 m-l-5">
                            Forgot?
                        </a>
                    </div>
                    <div class="wrap-input100 ">
                        <input class="form-control 
                        @error('Adminpassword') is-invalid @enderror "
                            type="password" name="Adminpassword">
                        <span class="focus-input100"></span>
                            @error('Adminpassword')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Sign In
                        </button>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            <span>
                                {{ Session::get('error') }}
                            </span>
                        </div>
                    @endif

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Not a member?
                        </span>

                        <a href="{{ route('registerForm') }}" class="txt2 bo1">
                            Sign up now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
