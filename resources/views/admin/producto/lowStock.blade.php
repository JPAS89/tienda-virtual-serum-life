@extends('layouts.app')
@section('seccion')
<link href="{{ asset('css/userIndex.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">Administracion de Productos</h1>
        <p class="lead text-center">Listado de productos bajo stock minimo.</p>
    </div>
</div>
<div class="container bootstrap snippets bootdey">

    <div class="header">
        <h3 class="text-muted prj-name">
            <span class="bi bi-code-slash"></span>
            Lista de Productos con bajo stock
        </h3>
    </div>
    <a href="{{route ('adminProducto')}}" class="btn btn-primary bi bi-bar-chart-steps" role="button" aria-pressed="true"> Ver todos los productos</a>



</div>
</br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive table-info">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Nombre de Producto</span></th>
                                <th><span>Codigo</span></th>
                                <th class="text-center"><span>Precio</span></th>
                                <th><span>Cantidad</span></th>
                                <th><span>Acciones</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listaDeProductos as $obj)
                            <tr>
                                <td>
                                    <img src="/Storage/{{$obj->urlimagen}}" alt="">
                                    <a href="#" class="user-link">{{ $obj->nombre }}</a>
                                    <span class="user-subhead">{{ $obj->descripcion }}</span>
                                </td>
                                <td>
                                    {{ $obj->id }}
                                </td>
                                <td class="text-center">
                                    <span class="label label-default">${{ $obj->precio}}</span>
                                </td>
                                <td>
                                    <span class="label label-default">{{ $obj->cantidad}}</span>
                                </td>
                                <td style="width: 20%;">
                                
                                    <a href="{{route ('vistaEditarProducto', $obj->id )}}" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="{{route ('vistaEditarCantidadProducto', $obj->id )}}" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#" class="table-link danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$obj->id}}">
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

                </ul>
            </div>
        </div>
    </div>
</div>
@include('modal.danger')
@endsection

@section('script')
<script src="{{ asset('js/eliminar.js') }}"></script>

@endsection