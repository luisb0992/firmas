@extends('layouts.app')
@section('title','Usuarios - '.config('app.name'))
@section('header','Usuario / Editar')
@section('content')
		<!-- Formulario -->
		<div class="row">
    	<div class="col-sm-12">
				<div class="card">
          <div class="card-header card-header-text card-header-warning">
            <div class="card-text">
              <h4 class="card-title">Editar usuario</h4>
            </div>
          </div>
          <div class="card-body">
						<form action="{{ route('users.update', $user->id )}}" method="POST">
							{{ method_field('PATCH') }}
							@csrf

							<div class="form-group {{ $errors->has('name')?'has-error':'' }}">
								<label class="control-label" for="name">Nombre: *</label>
								<input id="name" class="form-control" type="text" name="name" value="{{ old('name')?old('name'):$user->name }}" placeholder="Nombres">
							</div>

							<div class="form-group {{ $errors->has('email')?'has-error':'' }}">
								<label class="control-label" for="email">Email: *</label>
								<input id="email" class="form-control" type="mail" name="email" value="{{ old('email')?old('email'):$user->email }}" placeholder="Email">
							</div>

							<div class="form-group {{ $errors->has('user')?'has-error':'' }}">
								<label class="control-label" for="user">Usuario: *</label>
								<input id="user" class="form-control" type="text" name="user" value="{{ old('user')?old('user'):$user->user }}" placeholder="Usuario">
							</div>

							@if (count($errors) > 0)
		          <div class="alert alert-danger">
			          <ul>
			             @foreach($errors->all() as $error)
			               <li>{{$error}}</li>
			             @endforeach
			          </ul>
		          </div>
		        	@endif

							<div class="form-group text-right">
								<a class="btn btn-round btn-default" href="{{route('users.index')}}"><i class="fa fa-reply"></i> Atras</a>
								<button class="btn btn-round btn-warning" type="submit"><i class="fa fa-save"></i> Guardar</button>
							</div>
						</form>
          </div>
      	</div>
			</div>
		</div>
@endsection
