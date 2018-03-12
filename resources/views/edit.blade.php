<form action="POST" v-on:submit.prevent="updateKeep(fillKeep.id)">
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar Tarea</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
	          <span aria-hidden="true">&times;</span>
	        </button>
				</div>
				<div class="modal-body">
					<label for="keep" class="">Editar Tarea</label>
					<input type="text" class="form-control" v-model="fillKeep.keep">
					<span v-for="error in errors" class="text-danger">@{{ error }}</span>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>