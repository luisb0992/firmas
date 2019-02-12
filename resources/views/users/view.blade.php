@extends('layouts.app')
@section('title','Usuarios - '.config('app.name'))
@section('header','Usuario / Ver')
@section('content')
	<section>
    <a class="btn btn-default btn-round" href="{{ route('users.index') }}"><i class="fas fa-reply" aria-hidden="true"></i> Volver</a>
    <a class="btn btn-success btn-round" href="{{ route('users.edit',[$user->id]) }}"><i class="fas fa-edit" aria-hidden="true"></i> Editar</a>
    <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#delModal"><i class="fas fa-times" aria-hidden="true"></i> Eliminar</button>
	</section>

	<section>
		<div class="row">
    	<div class="col-sm-12">
				<div class="card">
          <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
              <h4 class="card-title">{{ $user->name }}</h4>
            </div>
          </div>
          <div class="card-body">
						<ul class="list-group list-group-flush">
					    <li class="list-group-item"><b>Email: </b> {{ $user->email }} </li>
					    <li class="list-group-item"><b>Usuario: </b> {{ $user->user }} </li>
					    <li class="list-group-item"><b>Registrado: </b> {{ date('d-m-Y',strtotime(str_replace('/', '-', $user->created_at))) }}</li>
					  </ul>
          </div>
      	</div>
			</div>
		</div>
	</section>

	<div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delModalLabel">
		<form class="" action="{{ route('users.destroy', $user->id)}}" method="POST">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
					<h4 class="modal-title" id="delModalLabel">Eliminar usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
              {{ method_field( 'DELETE' ) }}
              {{ csrf_field() }}
              <h4 class="text-center">¿Esta seguro de eliminar este usuario?</h4>
        </div>
				<div class="modal-footer">
					<button class="btn btn-danger" type="submit">Eliminar</button>
					<button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cerrar</button>
	      </div>
      </div>
    </div>
	</form>
  </div>
@endsection
