@extends('layouts.app')
@section('seccion')
<div class="container">
    <div class="row justify-content-center">
    @if(session()->has('success_msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success_msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      @endif
@if(session()->has('alert_msg'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('alert_msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      @endif
      
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear nuevo Categoria</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('creartipo')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" name="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : ''}}" value="{{ old('nombre') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Detalle</label>
                            <div class="col-md-6">
                                <input id="detalle" name="detalle" type="text" class="form-control{{ $errors->has('detalle') ? ' is-invalid' : ''}}" value="{{ old('detalle') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-6 text-center">
                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>
                            </div>
                            <div class="col-6 text-center">
                                <a class="btn btn-danger " href="{{ route('admintipos') }}" role="button">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection