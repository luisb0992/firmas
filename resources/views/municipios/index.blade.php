@extends('layouts.app')
@section('header','Municipios')
@section('content')

		@include('partials.flash')
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
  <div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-header card-header-danger card-header-icon">
					<div class="card-icon">
						<i class="material-icons">maps</i>
					</div>
					<p class="card-category">Municipios</p>
					<h3 class="card-title">
						{{ count($muni) }}
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
				<div class="card-header card-header-danger">
					<h4 class="card-title">
						<a href="#create_muni" data-target="#create_muni" data-toggle="modal" class="btn btn-danger">
							<i class="fa fa-plus" aria-hidden="true"></i> Nuevo municipio
						</a>
					</h4>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-hover data-table">
						<thead class="text-danger">
							<th>#</th>
							<th>Nombre</th>
							<th><i class="fa fa-cogs"></i></th>
						</thead>
						<tbody>
							@foreach($muni as $d)
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{{ $d->municipio }}</td>
									<td>
										<a class="btn btn-primary btn-round btn-sm" href="{{ route('sectores.show', $d->id)}}" rel="tooltip" data-placement="top" title="ver">
											<i class="material-icons">person</i>
										</a>
										<a href="{{ route('sectores.edit',[$d->id]) }}" class="btn btn-round btn-warning btn-sm" rel="tooltip" data-placement="top" title="Editar">
											<i class="material-icons">edit</i>
										</a>
										<a class="btn btn-round btn-danger btn-sm" href="{{ route('sectores.destroy', $d->id) }}"
											 onclick="event.preventDefault(); document.getElementById('delete_user').submit();" rel="tooltip" data-placement="top" title="Eliminar">
													<i class="material-icons">delete</i>
										</a>
										<form id="delete_user" class="" action="{{ route('sectores.destroy', $d->id)}}" method="POST" style="display: none;">
											{{ method_field( 'DELETE' ) }}
				              @csrf
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
  @include("municipios.modals.create_muni")
@endsection
