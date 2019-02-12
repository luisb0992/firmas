<div class="modal fade" tabindex="-1" role="dialog" id="edit_muni_{{ $d->id }}">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
        <form action="{{ route('sectores.update', $d->id) }}" method="POST" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          @csrf
        <div class="modal-header font-weight-bold">
          <h4 class="modal-title"><i class="fa fa-edit"></i> Actualizar Municipio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
						<div class="form-group has-danger">
							<label>Nombre</label>
							<input type="text" class="form-control text-uppercase" value="{{ $d->municipio }}" name="municipio" placeholder="indique nombre del municipio">
						</div>
				</div>
				<div class="modal-footer">
					<div class="form-group text-right">
						<input type="button" class="btn btn-round btn-secondary" data-dismiss="modal" value="Cerrar">
						<button type="submit" class="btn btn-round btn-warning">
							<i class="fa fa-edit"></i> Actualizar
						</button>
					</div>
				</div>
      </form>
			</div>
    </div>
	</div>
