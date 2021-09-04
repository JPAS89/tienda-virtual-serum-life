@extends('layouts.app')

@section('seccion')


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="{{ asset('css/userorders.css') }}" rel="stylesheet">
<br>
<br>
<br>
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
    <div class="col-md-12">
        @foreach ($listaDeOrdenes as $obj)
        <div class="card b-1 hover-shadow mb-20">

            <br>
            <div class="media card-body">
                <div class="media-left pr-12">
                    <img class="avatar avatar-xl no-radius" src="https://www.pikpng.com/pngl/m/80-805523_default-avatar-svg-png-icon-free-download-264157.png" alt="...">
                </div>
                <div class="media-body">
                    <div class="mb-2">
                        <span class="fs-20 pr-16">Usuario:</span>
                    </div>
                    <small class="fs-16 fw-300 ls-1">{{ $obj->name }} {{ $obj->secondName }}</small>
                </div>
                <div class="media-right text-right d-none d-md-block">
                    <p class="fs-14 text-fade mb-12"><i class="fa fa-map-marker pr-1"></i> {{ $obj->address }}</p>
                    <i class="bi bi-bucket-fill"></i><span class="text-fade">Numero de Orden</i> {{ $obj->id }}</span>
                    @if ($obj->status == "Pendiente")
                    <div class="my-2"><i class="bi bi-exclamation-lg"></i></i> <span class="text-600 text-90">Estado:</span> <span class="badge badge-warning badge-pill px-25">{{ $obj->status }}</span></div>
                    @endif
                    @if ($obj->status == "Entregado")
                    <div class="my-2"><i class="bi bi-exclamation-lg"></i></i> <span class="text-600 text-90">Estado:</span> <span class="badge badge-success badge-pill px-25">{{ $obj->status }}</span></div>
                    @endif
                    @if ($obj->status == "Anulada")
                    <div class="my-2"><i class="bi bi-exclamation-lg"></i></i> <span class="text-600 text-90">Estado:</span> <span class="badge badge-danger badge-pill px-25">{{ $obj->status }}</span></div>
                    @endif
                </div>
            </div>
            <footer class="card-footer flexbox align-items-center">
                <div>
                    <strong><i class="bi bi-calendar-check"></i>Fecha de Compra: </strong>
                    <span>{{ $obj->created_at }}</span>
                </div>
                <div class="card-hover-show">
                    <a class="btn btn-primary btn-sm" href="{{route ('detallePedido',  $obj->id )}}"><i class="bi bi-info-circle"></i>Ver Detalles</a>
                    @if ($obj->status == "Pendiente")
                    <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modal-anular" data-id="{{$obj->id}}"> Anular <i class="bi bi-trash"></i></a>
                    @endif
                </div>
            </footer>

        </div>
        @endforeach

        <nav>
            <ul class="pagination justify-content-center">
                {{ $listaDeOrdenes->links() }}
            </ul>
        </nav>
        <br>
    </div>
</div>
@include('modal.anularOrden')
@endsection


@section('script')

<script src="{{ asset('js/anularOrden.js') }}"></script>
@endsection