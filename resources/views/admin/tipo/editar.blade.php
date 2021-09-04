@extends('layouts.app')
@section('seccion')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edicion de la Categoria - {{ $tipo->name}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('editartipo')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$tipo->id}}"> <!-- este campo representa el id del campo que quiere editar-->
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" name="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : ''}}" value="{{ old('nombre', $tipo->nombre) }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Detalle</label>
                            <div class="col-md-6">
                                <input id="detalle" name="detalle" type="text" class="form-control{{ $errors->has('detalle') ? ' is-invalid' : ''}}" value="{{ old('detalle',  $tipo->detalle) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-6 text-center">
                                <button type="submit" class="btn btn-success">
                                    Guardar cambios
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