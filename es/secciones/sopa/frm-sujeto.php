<div id="frm-sujeto" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<form id="frm-sopa-sujeto" class="form-horizontal mb-lg">
			<header class="panel-heading">
				<h2 class="panel-title">Crear sujeto</h2>
			</header>
			<div class="panel-body">
				<input type="hidden" name="idu" value="<?php echo $idu;?>">
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-9">
						<input type="text" name="nombre" class="form-control" placeholder="Escriba un nombre para el sujeto" required/>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-primary">Crear</button>
						<button id="cl_frm-sujeto" class="btn btn-default modal-dismiss">Cancelar</button>
					</div>
				</div>
			</footer>
		</form>
	</section>
</div>