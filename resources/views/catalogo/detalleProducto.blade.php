@extends('layouts.app')

@section('seccion')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<link href="{{ asset('css/detailProduct.css') }}" rel="stylesheet">
<div class="container">
@if(session()->has('success_msg'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session()->get('success_msg') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	@endif
    <div class="row">
        <div class="col-md-5">
            <div class="project-info-box mt-0">
                <h4>DETALLES DEL PRODUCTO </h4>
                <h5>{{ $producto->nombre}}</h5>
                <p class="mb-0">{{ $producto->descripcion}}.</p>
            </div><!-- / project-info-box -->

            <div class="project-info-box">
               
                <p><b>Existencias:</b> {{ $producto->cantidad}}</p>
                <p class="mb-0"><b>Precio:</b> ${{ $producto->precio}}</p>
                <p><b>Ultima Actualizacion:</b> {{ $producto->updated_at}}</p>
                
            </div><!-- / project-info-box -->

            <div class="project-info-box mt-0 mb-0">
                <p class="mb-0">                  
                     <form action="{{route ('cart.add')}}" method="post" >
                         @csrf
                         <span class="fw-bold mr-10 va-middle hide-mobile">Acciones:</span>             
                    <input type="hidden" name="producto_id" value="{{$producto->id}}">
                    <button class="btn btn-warning "  type="submit" ><i class="bi bi-cart-plus">Agregar</i> </button>
                    <a class="btn btn-secondary " href="{{ route('catalogo') }}" role="button"><i class="bi bi-arrow-left-square"></i>Regresar</a>
                     </form> 
                </p>             
            </div><!-- / project-info-box -->
        </div><!-- / column -->

        <div class="col-md-7 text-center">
            <img src="../Storage/{{$producto->urlimagen}}" alt="project-image" class="rounded">
            
        </div><!-- / column -->
    </div>
</div>
@endsection