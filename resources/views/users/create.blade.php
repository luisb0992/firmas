@extends('layouts.app')
@section('title','Usuarios - '.config('app.name'))
@section('header','Usuarios / Crear')
@section('content')
		<!-- Formulario -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
          <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
              <h4 class="card-title">Nuevo usuario</h4>
            </div>
          </div>
          <div class="card-body">
						<form action="{{ route('users.store') }}" method="POST">
							@csrf

							<div class="form-group {{ $errors->has('name')?'has-error':'' }}">

								<label class="control-label" for="name">Nombre: *</label>
								<input id="name" class="form-control" type="text" name="name" value="{{ old('name')?old('name'):'' }}" placeholder="Nombre" required>
							</div>

							<div class="form-group {{ $errors->has('user')?'has-error':'' }}">
								<label class="control-label" for="user">Usuario: *</label>
								<input id="user" class="form-control" type="text" name="user" value="{{ old('user')?old('user'):'' }}" placeholder="Usuario" required>
							</div>

							<div class="form-group {{ $errors->has('email')?'has-error':'' }}">
								<label class="control-label" for="email">Email: *</label>
								<input id="email" class="form-control" type="email" name="email" value="{{ old('email')?old('email'):'' }}" placeholder="Email" required>
							</div>

							<div class="form-group {{ $errors->has('password')?'has-error':'' }}">
								<label class="control-label" for="password">Contraseña: *</label>
								<input id="password" class="form-control" type="password" name="password" required>
							</div>

							<div class="form-group {{ $errors->has('password_confirmation')?'has-error':'' }}">
								<label class="control-label" for="password_confirmation">Repetir Contraseña: *</label>
								<input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
							</div>

							@if (count($errors) > 0)
			          <div class="alert alert-danger alert-important">
				          <ul>
				            @foreach($errors->all() as $error)
				              <li>{{$error}}</li>
				            @endforeach
				          </ul>
			          </div>
			        @endif

							<div class="form-group text-right">
								<a class="btn btn-round btn-default" href="{{route('users.index')}}"><i class="fa fa-reply"></i> Atras</a>
								<button class="btn btn-round btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
							</div>
						</form>
          </div>
      	</div>
			</div>
		</div>
@endsection
