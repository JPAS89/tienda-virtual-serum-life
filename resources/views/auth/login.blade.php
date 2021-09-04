@extends('layouts.app')

@section('seccion')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Styles -->
<link href="{{ asset('css/signin.css') }}" rel="stylesheet">

<h1></h1>
<div class="text-center">
    <img src="storage/slider/logo2.png" alt="" width="100" height="80">
</div>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mb-0">
                <div class="card p-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2>Login</h2>
                            <p class="text-muted">Ingrese a su cuenta</p>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-dark "><i class="bi bi-person-circle"></i></button>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <button type="button" class="btn btn-dark "><i class="bi bi-file-lock2-fill"></i></button>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary  px-4">Login</button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link btn-sm px-4" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-secondary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>BIENVENIDO</h2>
                            <p>Se parte de la familia Serum Life.</p>
                            <a class="text-white btn btn-primary" href="{{ route('register') }}" role="button">Registrarme </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection