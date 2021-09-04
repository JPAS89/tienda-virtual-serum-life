@extends('layouts.app')

@section('seccion')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">Actualizar existencias de Productos</h1>
        <p class="lead text-center">Vista para modificar las existencias de los productos</p>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edicion del Producto - {{ $producto->nombre}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('actualizarExistencia')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$producto->id}}"> <!-- este campo representa el id del campo que quiere editar-->
                       

                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Digite la Cantidad </label>
                            <div class="col-md-6">
                                <input id="cantidad" name="cantidad" type="number" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : ''}}" value="{{ old('cantidad',  $producto->cantidad) }}" required>
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