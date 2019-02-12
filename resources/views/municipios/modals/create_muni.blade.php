<form action="{{ route('sectores.store') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
	<div class="modal fade" tabindex="-1" role="dialog" id="create_muni">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-plus"></i> Crear Municipio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
						<div class="form-group has-danger">
							<label>Nombre</label>
							<input type="text" class="form-control text-uppercase" name="municipio" placeholder="indique nombre del municipio">
						</div>
				</div>
				<div class="modal-footer">
					<div class="form-group text-right">
						<input type="button" class="btn btn-round btn-danger" data-dismiss="modal" value="Cerrar">
						<button type="submit" class="btn btn-round btn-success">
							<i class="fa fa-save"></i> Guardar
						</button>
					</div>
				</div>
			</div>
    </div>
	</div>
</form>
