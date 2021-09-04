@extends('layouts.app')
@section('seccion')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
    
    .jumbotron {
    padding: 2rem 1rem;
    margin-bottom: 0rem;
    background-color: #ebecef;
    border-radius: .3rem;
    }
  }
</style>
<main role="main">

  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">

      <h1>Catálogo de Productos</h1>
      <h5>Conoce todos los beneficios de nuestros productos.</h5>
      <img src="/storage/slider/backCatalogo.jpg" class="img-fluid" alt="">
      <p></p>
      <p> <a href="/about" class="btn btn-success btn-lg ">Nuestra Historia</a> </p>

    </div> 
    
  </div> 
  
  <div class="album py-5 bg-light">

    <div class="container">
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
      <!--  <div class="form-group row">
        <div class="col-md-6">
          <h4>Buscar Productos</h4>
          <div class="input-group">
            <select class="form-control col-md-3" v-model="criterio">
              <option value="nombre">Nombre</option>
              <option value="descripcion">Descripción</option>
            </select><!-- //cuando se enter vamos a llamar nuestro metodo 
            <input type="text" v-model="buscar" @keyup.enter="listarProducto(1,buscar,criterio)" class="form-control" placeholder="Producto a buscar">
            <br>
            <button type="submit" @click="listarProducto(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
          </div>

        </div>
      </div>-->
      <div class="row">
        @foreach ($listaDeProductos as $producto)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="../Storage/{{$producto->urlimagen}}" alt="..." />
            <div class="card-body">
              <h4 class="card-title pricing-card-title text-center" id="nombre">{{$producto->nombre}}</h4>
              <h4 class="card-title pricing-card-title text-center">${{$producto->precio}} <small class="text-muted">/ Precio</small></h4>
              <h6 class="card-text text-center">{{$producto->descripcion}}.</h6>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route ('detalleProducto', $producto->id )}}" class="btn btn-primary "><i class="bi bi-info-circle-fill"></i>Detalles</a>
                  <form action="{{route ('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{$producto->id}}">
                    <button class="btn btn-secondary" type="submit"><i class="bi bi-cart-plus">Agregar</i> </button>
                  </form>
                </div>
                <small class="text-muted">Stock {{$producto->cantidad}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <ul class="pagination justify-content-center pagination-sm">
        <li>{{ $listaDeProductos->links()}}</li>
      </ul>

    </div>
</main>
@yield('script')


@endsection