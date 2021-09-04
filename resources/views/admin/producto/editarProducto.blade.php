@extends('layouts.app')

@section('seccion')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">Edicion de Productos</h1>
        <p class="lead text-center">Vista para la edicion de los productos.</p>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edicion del Producto - {{ $producto->nombre}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('editarProducto')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$producto->id}}"> <!-- este campo representa el id del campo que quiere editar-->
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" name="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : ''}}" value="{{ old('nombre', $producto->nombre) }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Detalle</label>
                            <div class="col-md-6">
                                <input id="detalle" name="detalle" type="text" class="form-control{{ $errors->has('detalle') ? ' is-invalid' : ''}}" value="{{ old('detalle',  $producto->detalle) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Cantidad</label>
                            <div class="col-md-6">
                                <input id="cantidad" name="cantidad" type="number" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : ''}}" value="{{ old('cantidad',  $producto->cantidad) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Precio</label>
                            <div class="col-md-4">
                                <input id="precio" name="precio" type="number" class="form-control{{ $errors->has('precio') ? ' is-invalid' : ''}}" value="{{ old('precio',  $producto->precio) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombreImagen" class="col-md-4 col-form-label text-md-right">Seleccionar imagen</label>
                            <div class="col-md-6">

                                <input id="urlimagen" name="urlimagen" type="file" class="form-control{{ $errors->has('archivo') ? ' is-invalid' : ''}}" value="{{ old('urlimagen') }}">

                                @if ($errors->has('urlimagen')) si ocurre un error se mostrara un mensaje
                                <span class="invalid-feedback">
                                    <strong>
                                        <{{ $errors->first('urlimagen') }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-6 text-center">
                                <button type="submit" class="btn btn-success">
                                    Guardar cambios
                                </button>
                            </div>
                            <div class="col-6 text-center">
                                <a class="btn btn-danger " href="{{ route('adminProducto') }}" role="button">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection