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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Producto</div>
                <div class="card-body">
                    @if ($errors->has('urlimagen'))
                    <!-- si ocurre un error se mostrara un mensaje-->
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!--accept-charset="UTF-8" enctype="multipart/form-data"/// eso sirve para decirle que enviamos archivo y no desconfie-->
                    <form method="POST" action="{{ route('crearproducto')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" name="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : ''}}" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>
                                        <{{ $errors->first('name') }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="tipo_id" class="col-md-4 col-form-label text-md-right">Categoria</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="tipo_id" id="tipo_id" required>
                                    <option value="" selected>Seleccione una categoria</option>
                                    @foreach($listaDeTipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->name}} ({{$tipo->description}})</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad</label>
                            <div class="col-md-6">
                                <input id="cantidad" name="cantidad" type="number" step="0.01" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : ''}}" value="{{ old('cantidad') }}" required>

                                @if ($errors->has('cantidad'))
                                <span class="invalid-feedback">
                                    <strong>
                                        <{{ $errors->first('cantidad') }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">Precio</label>
                            <div class="col-md-6">
                                <input id="precio" name="precio" type="number" step="0.01" class="form-control{{ $errors->has('precio') ? ' is-invalid' : ''}}" value="{{ old('precio') }}" required>

                                @if ($errors->has('precio'))
                                <span class="invalid-feedback">
                                    <strong>
                                        <{{ $errors->first('precio') }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                            <div class="col-md-6">
                                <input id="descripcion" name="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : ''}}" value="{{ old('descripcion') }}" required>

                                @if ($errors->has('descripcion'))
                                <span class="invalid-feedback">
                                    <strong>
                                        <{{ $errors->first('descripcion') }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombreImagen" class="col-md-4 col-form-label text-md-right">Seleccionar imagen</label>
                            <div class="col-md-6">

                                <input id="urlimagen" name="urlimagen" type="file" class="form-control{{ $errors->has('archivo') ? ' is-invalid' : ''}}" value="{{ old('urlimagen') }}" required>

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
                                    Guardar
                                </button>
                            </div>
                            <div class="col-6 text-center">
                                <a class="btn btn-danger " href="{{ route('adminProducto') }}" role="button">Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="/js/seleccionarcategoriasportipo.js"> </script>
@endsection