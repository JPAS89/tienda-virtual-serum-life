@extends('layouts.app')
@section('seccion')

<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route ('catalogo')}}">Seguir Comprando</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>
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
    @if(count($errors) > 0)
    @foreach($errors0>all() as $error)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endforeach
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <br>
            @if(Cart::getTotalQuantity()>0)
            <h4>{{ Cart::getTotalQuantity()}} Productos en el carrito</h4><br>
            @else
            <h4>No hay Producto(s) en el carrito</h4><br>
            <a href="{{ route('catalogo')}}" class="btn btn-dark">Continuar comprando</a>
            @endif

            @foreach($cartCollection as $item)
            <div class="row">
                <div class="col-lg-3">
                    <img src="/storage/{{ $item->attributes->image }}" class="img-thumbnail" width="200" height="200">
                </div>
                <div class="col-lg-5">
                    <p>
                        <b><a href="">{{ $item->name }}</a></b><br>
                        <b>Precio: </b>${{ $item->price }}<br>
                        <b>Sub Total: </b>${{ Cart::get($item->id)->getPriceSum() }}<br>
                        {{-- <b>With Discount: </b>${{ Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                    </p>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <form action="{{ route('cart.update') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}" id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                <button class="btn btn-secondary btn-sm" style=" width: 70px; margin-right: 10px;"><i class="bi bi-pencil-square"></i></button>
                            </div>
                        </form>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">

                            <button class="btn btn-danger btn-sm" style="margin-right: 10px;"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            @if(count($cartCollection)>0)
            <form action="{{ route('cart.clear') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-danger btn-md">Limpiar Carrito</button>
            </form>
            @endif

            </ul>
        </div>
        @if(count($cartCollection)>0)
        <div class="col-lg-5">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Monto Total ${{ \Cart::getTotal() }}</b></li>
                </ul>
            </div>
            <br><a href="{{ route('catalogo')}}" class="btn btn-primary">Seguir Comprando</a>
            
            @auth

            <form action="{{ route('cart.createOrder') }}" method="POST">
                {{ csrf_field() }}
                @foreach($cartCollection as $item)
                <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                <input type="hidden" value="{{ $item->quantity}}" id="quantity" name="quantity">
                @endforeach
                <br><button class="btn btn-success btn-md">Finalizar Pedido</button>
            </form>

            @endauth
            @guest
            <a href="{{ route('login')}}" class="btn btn-warning">Acceder para Finalizar la Compra </a>
            @endguest
        </div>
        @endif
    </div>
    <br><br>
</div>
@endsection