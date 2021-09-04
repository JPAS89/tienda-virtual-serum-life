@extends('layouts.app')

@section('seccion')
<!-- Custom styles for this template -->
<link href="{{ asset('css.editUser.css') }}" rel="stylesheet">

<div class="container">
	@if(session()->has('success_msg'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session()->get('success_msg') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	@endif
	<div class="main-body">
		<form method="POST" action="{{ route('actualizarUsuario') }}">
			@csrf
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
							<img src="https://www.pikpng.com/pngl/m/80-805523_default-avatar-svg-png-icon-free-download-264157.png" alt="Admin" class="rounded-circle " width="110">
								<div class="mt-3">
									<h4>{{ Auth::user()->name}}</h4>
								
									<a class="btn btn-primary" href="/miCuenta " role="button">Mi Perfil</a>
								</div>
							</div>
							<hr class="my-4">
					
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<h5 class="d-flex align-items-center mb-3">Digite los datos nuevos</h5>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nombre</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Apellido</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="secondName" type="text" class="form-control @error('secondName') is-invalid @enderror" name="secondName" value="{{ old('secondName') }}" required autocomplete="secondName" autofocus>
									@error('Apellidos')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Telefono</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="telephone" type="number" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

									@error('Telefono')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Direccion</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

									@error('Direccion')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<button type="submit" class="btn btn-success">
										{{ __('Actualizar') }}
									</button>
									<a class="btn btn-danger " href="/miCuenta" role="button">Cancelar</a>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="d-flex align-items-center mb-3">Datos Actuales</h5>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Nombre</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											{{ Auth::user()->name}}
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Apellidos</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											{{ Auth::user()->secondName}}
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Email</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											{{ Auth::user()->email}}
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Telefono</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											{{ Auth::user()->telephone}}
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Direccion</h6>
										</div>
										<div class="col-sm-9 text-secondary" type="password">
											{{ Auth::user()->address}}
										</div>
									</div>
									<hr>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection