@extends('layouts.app')
@section('header','Usuarios')
@section('content')

		@include('partials.flash')
  <div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-header card-header-primary card-header-icon">
					<div class="card-icon">
						<i class="material-icons">people</i>
					</div>
					<p class="card-category">usuarios</p>
					<h3 class="card-title">
						{{ count($users) }}
					</h3>
				</div>
				<div class="card-footer">
					<div class="stats">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="card-title">
						<a href="{{ route('users.create') }}" class="btn btn-primary">
							<i class="fa fa-plus" aria-hidden="true"></i> Nuevo usuario
						</a>
					</h4>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-hover data-table">
						<thead class="text-primary">
							<th>#</th>
							<th>Nombre</th>
							<th>Usuario</th>
							<th>Email</th>
							<th>Status</th>
							<th><i class="fa fa-cogs"></i></th>
						</thead>
						<tbody>
							@foreach($users as $d)
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{{ $d->name }}</td>
									<td>{{ $d->user }}</td>
									<td>{{ $d->email }}</td>
									<td class="text-capitalize {{ $d->status === 'activo' ? 'text-success' : 'text-danger' }}">
										{{ $d->status }}
									</td>
									<td>
										<a class="btn btn-primary btn-round btn-sm" href="{{ route('users.show', $d->id)}}" rel="tooltip" data-placement="top" title="ver">
											<i class="material-icons">person</i>
										</a>
										<a href="{{route('users.edit',[$d->id])}}" class="btn btn-round btn-warning btn-sm" rel="tooltip" data-placement="top" title="Editar">
											<i class="material-icons">edit</i>
										</a>
										@if($d->id <> 1)
										<a class="btn btn-success btn-round btn-sm" href="{{ route('statusUser', $d->id)}}" rel="tooltip" data-placement="top" title="Cambiar status?" onclick="return confirm('Cambiar status del usuario?');">
											<i class="fas fa-bug"></i>
										</a>
										<a class="btn btn-round btn-danger btn-sm" href="{{ route('users.destroy', $d->id) }}"
											 onclick="event.preventDefault(); document.getElementById('delete_user').submit();" rel="tooltip" data-placement="top" title="Eliminar">
													<i class="material-icons">delete</i>
										</a>
										<form id="delete_user" class="" action="{{ route('users.destroy', $d->id)}}" method="POST" style="display: none;">
											{{ method_field( 'DELETE' ) }}
				              @csrf
										</form>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
