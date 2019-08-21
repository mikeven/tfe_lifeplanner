<div id="frm-actividad-cal" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<form id="frm-nagenda" class="form-horizontal mb-lg" autocomplete="off">
			<header class="panel-heading">
				<h2 class="panel-title">
					Schedule activity
				</h2>
			</header>
			<div class="panel-body">
				<input id="id_actividad_cal" type="hidden" name="id_actividad">
				<div class="row">
					<div id="info_actividad" class="col-sm-12 col-md-12 col-xs-12">
						
					</div>
				</div>
				<hr>
				<span class="">Task date</span>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<input id="fagenda_act" type="text" required 
					data-plugin-datepicker class="form-control" name="fecha_cal">
				</div>
				<span class="">Task time</span>
				<div class="input-group">
					<span class="input-group-addon"> <i class="fa fa-clock-o"></i> </span>
					<input type="text" name="hora_cal" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<button id="cl_frm_act_cal" class="btn btn-default modal-dismiss">Cancel</button>
					</div>
				</div>
			</footer>
		</form>
	</section>
</div>