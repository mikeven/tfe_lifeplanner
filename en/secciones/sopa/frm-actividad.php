<div id="frm-actividad" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<form id="frm-nactividad" class="form-horizontal mb-lg">
			<header class="panel-heading">
				<h2 class="panel-title">
					Create activity (<span id="lab_na_prop"></span>)
				</h2>
			</header>
			<div class="panel-body">
				<input id="id_prop_act" type="hidden" name="id_prop_act">
				<div class="row">
					<div class="col-sm-3">
						<div class="radio-custom radio-primary rnva_act" 
						data-tipo="a_gestion">
							<input type="radio" id="gestion" name="tipo" required value="g">
							<label for="gestion">Outdoor</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="radio-custom radio-primary rnva_act" 
						data-tipo="a_escritorio">
							<input type="radio" id="escritorio" name="tipo" required value="e">
							<label for="escritorio">Desk</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="radio-custom radio-primary rnva_act" 
						data-tipo="a_llamada">
							<input type="radio" id="llamada" name="tipo" required value="l">
							<label for="llamada">Call</label>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group mt-lg a_gestion campos_act">
					<label class="col-sm-3 control-label">Place</label>
					<div class="col-sm-9">
						<input type="text" name="lugar" class="form-control" 
						placeholder="Enter a place for this activity" required/>
					</div>
				</div>
				<div class="form-group mt-lg a_gestion campos_act">
					<label class="col-sm-3 control-label">Address</label>
					<div class="col-sm-9">
						<input type="text" name="direccion" class="form-control" 
						placeholder="Enter an address for this activity" required/>
					</div>
				</div>
				<div class="form-group mt-lg a_gestion a_escritorio campos_act">
					<label class="col-sm-3 control-label">Task</label>
					<div class="col-sm-9">
						<input type="text" name="tarea" class="form-control" placeholder="Enter a task for this activity" required/>
					</div>
				</div>
				<div class="form-group mt-lg a_llamada campos_act">
					<label class="col-sm-3 control-label">Contact</label>
					<div class="col-sm-9">
						<input type="text" name="contacto" class="form-control" placeholder="Enter contact name for this activity" required/>
					</div>
				</div>
				<div class="form-group mt-lg a_llamada campos_act">
					<label class="col-sm-3 control-label">Motivo</label>
					<div class="col-sm-9">
						<input type="text" name="motivo" class="form-control" placeholder="Enter a motive for this activity" required/>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<button class="btn btn-default modal-dismiss">Cancel</button>
					</div>
				</div>
			</footer>
		</form>
	</section>
</div>