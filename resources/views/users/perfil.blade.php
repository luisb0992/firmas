@extends('layouts.app')
@section('title','Perfil - '.config('app.name'))
@section('header','Usuarios / Perfil')
@section('content')
<div class="row">
	<div class="col-sm-12">
		@include('partials.flash')
		<div class="card">
			<div class="card-header card-header-text card-header-info">
				<div class="card-text">
					<h4 class="card-title">{{ $perfil->name }}</h4>
				</div>
			</div>
			<div class="card-body">
				<form action="{{ route('update_perfil') }}" method="POST">
				  {{method_field('PATCH')}}
				  @csrf

				  <div class="form-group {{$errors->has('name')?'has-error':''}}">
				    <label for="name">Nombre: *</label>
				    <input type="text" class="form-control" name="name" value="{{$perfil->name}}" required>
				  </div>

				  <div class="form-group {{$errors->has('user')?'has-error':''}}">
				    <label for="user">Usuario: *</label>
				    <input type="text" class="form-control" name="user" value="{{$perfil->user}}" required>
				  </div>

					<div class="form-group {{$errors->has('email')?'has-error':''}}">
				    <label for="email">Email: *</label>
				    <input type="mail" class="form-control" name="email" value="{{$perfil->email}}" required>
				  </div>

				  <div class="form-group">
						<div class="form-check">
							<label class="form-check-label">
								<input id="pp" type="checkbox" name="checkbox" value="Yes" class="form-check-input"> Cambiar contraseña?
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
				  </div>

				  <section id="password_fields" style="display:none">
					  <div class="form-group">
					  	<label>Contraseña nueva: *</label>
					  	<input id="password" class="form-control" type="password">
					  </div>
					  <div class="form-group">
					  	<label>Repetir Contraseña: *</label>
					  	<input id="password_confirmation" class="form-control" type="password">
					  </div>
				  </section>

					@if (count($errors) > 0)
					<div class="col-md-12">
        		<div class="alert alert-danger">
          		<ul>
		            @foreach($errors->all() as $error)
		              <li>{{$error}}</li>
		            @endforeach
          		</ul>
        		</div>
          </div>
        	@endif

				  <div class="form-group text-right">
						<a class="btn btn-round btn-default" href="{{route('users.index')}}"><i class="fa fa-reply"></i> Atras</a>
				    <button class="btn btn-round btn-info" type="submit">
							<i class="material-icons">save</i> Actualizar
						</button>
				  </div>
			  </form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
 	<script type="text/javascript">
 	$(document).ready(function(){
 			$("#pp").click(function(event) {
		 		var bool = this.checked;
		 		if(bool === true){
		 			$("#password_fields").show();
		 			$("#password").prop('required',true).attr("name", "password");
		 			$("#password_confirmation").prop('required',true).attr("name", "password_confirmation");
		 		}else{
		 			$("#password_fields").hide();
					$("#password").prop('required',false).removeAttr("name", "password");
		 			$("#password_confirmation").prop('required',false).removeAttr("name", "password_confirmation");
		 		}
	 	});
 	});
 	</script>
@endsection
