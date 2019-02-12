@extends('layouts.app')
@section('title','Usuarios - '.config('app.name'))
@section('header','Usuarios / Crear')
@section('content')
		<!-- Formulario -->
		<div class="row">
			<div class="col-sm-8 offset-2">
				<div class="card">
          <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
              <h4 class="card-title">Nueva Carga</h4>
            </div>
          </div>
          <div class="card-body">
						<form action="{{ route('cargas.store') }}" method="POST">
							@csrf
							<div class="form-group {{ $errors->has('hora_reporte')?'has-error':'' }}">
								<label class="control-label" for="user">Hora: *</label>
								<select class="form-control" name="hora_reporte" required="">
									<option value="">Seleccione....</option>
									<option value="6 AM">6 AM</option>
									<option value="7 AM">7 AM</option>
									<option value="8 AM">8 AM</option>
									<option value="9 AM">9 AM</option>
									<option value="10 AM">10 AM</option>
									<option value="11 AM">11 AM</option>
									<option value="12 PM">12 PM</option>
									<option value="1 PM">1 PM</option>
									<option value="2 PM">2 PM</option>
									<option value="3 PM">3 PM</option>
									<option value="4 PM">4 PM</option>
									<option value="5 PM">5 PM</option>
									<option value="6 PM">6 PM</option>
									<option value="7 PM">7 PM</option>
								</select>
							</div>
							<br>
							<div class="form-group {{ $errors->has('hora_reporte')?'has-error':'' }}">
								<label class="control-label" for="user">Municipio: *</label>
								<select class="form-control" name="sector_id" required="">
									<option value="">Seleccione....</option>
									@foreach($municipios as $m)
										<option value="{{$m->id}}">{{$m->municipio}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div class="form-group {{ $errors->has('total')?'has-error':'' }}">
								<label class="control-label" for="total">Total: *</label>
								<input id="total" class="form-control" type="number" name="total" required>
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
