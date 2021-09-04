@extends ('layouts.app')

@section ('seccion')
<link href="{{ asset('css/userIndex.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">Administracion de Pedidos</h1>
        <p class="lead text-center">Listado de todas los pedidos.</p>
    </div>
</div>
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

<div class="container bootstrap snippets bootdey">

    <div class="header">
        <h3 class="text-muted prj-name">
            <span class="bi bi-bag-check"></span>
            Lista de Pedidos
        </h3>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive table-info">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Orden</span></th>
                                <th><span>Usuario</span></th>
                                <th class="text-center"><span>Fecha de Compra</span></th>
                                <th><span>Estado del Pedido</span></th>
                                <th><span>Acciones</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listaDeOrdenes as $obj)
                            <tr>
                                <td>
                                    <img src="" alt="">
                                    <span class="label label-default"> {{ $obj->id }}</span>
                                    <span class="user-subhead"></span>
                                </td>
                                <td>
                                    {{ $obj->email }}
                                </td>
                                <td class="text-center">
                                    <span class="label label-default"> {{ $obj->created_at }}</span>
                                </td>
                                <td>
                                    <span class="label label-default">{{ $obj->status }}</span>
                                </td>
                                <td style="width: 20%;">
                                    <a href="{{route ('detallePedido', $obj->id )}}" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>

                                    <a href="" class="table-link" data-toggle="modal" data-target="#modal-confirmacion" data-id="{{$obj->id}}">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="bi bi-check2-circle fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>


                                    <a href="" class="table-link danger" data-toggle="modal" data-target="#modal-anular" data-id="{{$obj->id}}">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </br>
                <ul class="pagination pull-center">
                    {{ $listaDeOrdenes->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>
@include('modal.success')
@include('modal.anularOrden')
@endsection


@section('script')
<script src="{{ asset('js/entregarOrden.js') }}"></script>
<script src="{{ asset('js/anularOrden.js') }}"></script>
@endsection