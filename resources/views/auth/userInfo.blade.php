@extends('layouts.app')

@section('seccion')

<!-- Custom styles for this template -->
<link href="{{ asset('css.userInfo.css') }}" rel="stylesheet">
<div class="container">
  <div class="main-body">
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
            <img src="https://www.pikpng.com/pngl/m/80-805523_default-avatar-svg-png-icon-free-download-264157.png"  alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{ Auth::user()->name}} {{ Auth::user()->secondName}}</h4>
                <p class="text-secondary mb-1">Registro desde: {{ Auth::user()->created_at}} </p>
                <p class="text-muted font-size-sm">Ultima actualizacion {{ Auth::user()->updated_at}}</p>
                <li class="btn btn-danger " href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  Cerrar Sesion
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <!--meter logo aqui-->
           <!--<img src="images/logo1.png" alt="logo" style="width: 100%; max-width: 300px" />-->
        </div>
      </div>

      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
          <h5 class="d-flex align-items-center mb-3 text-center">Datos Personales</h5>
          <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Nombre</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->name}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Apellidos</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->secondName}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->email}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Telefono</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->telephone}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Direccion</h6>
              </div>
              <div class="col-sm-9 text-secondary" type="password">
                {{ Auth::user()->address}}
              </div>
            </div>
            <hr>
            
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-success  " target="__blank" href="{{ route('vistaEditarUsuario')}}">Editar Perfil</a>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</div>
@endsection