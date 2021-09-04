@extends('layouts.app')
@section('seccion')
<link href="{{ asset('css/userIndex.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">Administracion de Categorias</h1>
        <p class="lead"></p>
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
            <span class="bi bi-code-slash"></span>
            Lista de Categorias
        </h3>
    </div>
    <a href="{{route ('verasistentecreartipo')}}" class="btn btn-primary bi bi-plus-circle" role="button" aria-pressed="true"> Nueva Categoria</a>
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
                                <th><span>Nombre de Categoria</span></th>
                                <th><span>Codigo</span></th>
                                <th class="text-center"><span>Descripcion</span></th>
                                <th><span>Acciones</span></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($listaDeTodosLosTipos as $obj)
                            <tr>
                                <td>
                                <span class="label label-default">{{ $obj->name }}</span>
                                    <span class="user-subhead"></span>
                                </td>
                                <td>
                                {{ $obj->id }}
                                </td>
                                <td>
                                    <span class="label label-default">{{ $obj->description}}</span>
                                </td>
                                <td style="width: 20%;">
                                    <a href="{{route ('vistaeditar', $obj->id)}}" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="{{route ('eliminartipo', $obj->id)}}" class="table-link danger">
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
                {{ $listaDeTodosLosTipos->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection