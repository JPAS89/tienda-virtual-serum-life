@extends('layouts.app')

@section('seccion')
<link href="{{ asset('css/userIndex.css') }}" rel="stylesheet">
<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4 text-center">Administracion de Usuarios</h1>
		<p class="lead text-center">Menu de administracion de Usuarios.</p>
	</div>
</div>
<div class="container bootstrap snippets bootdey">

	<div class="header">
		<h3 class="text-muted prj-name">
			<span class="bi bi-people-fill bi-2x principal-title"></span>
			Usuarios
		</h3>
	</div>
</div>
</div>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="main-box clearfix">
				<div class="table-info">
					<table class="table user-list">
						<thead>
							<tr>
								<th><span>Usuario</span></th>
								<th><span>Creado</span></th>
								<th class="text-center"><span>Id Usuario</span></th>
								<th><span>Email</span></th>
								<th><span>Acciones</span></th>

							</tr>
						</thead>
						<tbody>
							@foreach($listaDeUsuarios as $obj)
							<tr>
								<td>
									<img src="https://www.pikpng.com/pngl/m/80-805523_default-avatar-svg-png-icon-free-download-264157.png" alt="Default Avatar Svg Png Icon Free Download 264157 User - Avatar Icon Png Clipart@pikpng.com">
									<a href="{{route ('detalleUsuario', $obj->id )}}" class="user-link"> {{ $obj->name }} {{ $obj->secondName }}</a>
									<span class="user-subhead"></span>
								</td>
								<td>
									{{ $obj->created_at }}
								</td>
								<td class="text-center">
									<span class="label label-default">{{ $obj->id }}</span>
								</td>
								<td>
									<a href="#">{{ $obj->email }}</a>
								</td>
								<td style="width: 20%;">
									<a href="{{route ('detalleUsuario', $obj->id )}}" class="table-link">
										<span class="fa-stack">
											<i class="fa fa-square fa-stack-2x"></i>
											<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
										</span>
									</a>
									<!--
								<a href="#" class="table-link">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
									</span>
								</a>
								<a href="#" class="table-link danger">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
									</span>
								</a>-->
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<ul class="pagination pull-center">
					{{ $listaDeUsuarios->links() }}
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection