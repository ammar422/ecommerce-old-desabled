@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.regester') }}">
                            @csrf
                            <div class="form-group">
                                <label>Admin key</label>
                                <input type="text" class="form-control  @error('adminKey') is-invalid @enderror "
                                    name="adminKey">
                                @error('adminKey')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name = 'email'>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror "
                                    name="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>confirm pasword</label>
                                <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror "
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <span>
                                            {{ $message }}
                                        </span>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">regester</button>
                            <a class="btn btn-danger" href="{{ route('admin.loginForm') }}">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
