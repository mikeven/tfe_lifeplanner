
<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="fa fa-caret-down"></a>
		</div>

		<h2 class="panel-title">Status <?php echo $titulo_pagina; ?></h2>
	</header>
	<div class="panel-body">
		

		<div class="col-md-4 col-sm-12 col-xs-12">
			
			<section class="panel panel-primary">
				<header class="panel-heading panel-warning">
					<h2 class="panel-title">Priority</h2>
				</header>
				<div id="tabla_actividades_prioridad" class="panel-body">
					<table id="datatable-prioridades_" class="table table-bordered table-striped mb-none" >
						<thead class="hidden">
							<tr>
								<th width="70%">Activity</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ( $todas_actividades as $a ) { 
									if( $a["estado"] == "prioridad" ){
							?>
								<tr class="gradeX">
									<td>
										<a href="#actividad-historial" class="info_hist modal-sizes modal-with-zoom-anim" 
										data-ida="<?php echo $a["id_act"] ?>">
											<?php echo infoActSO( $a ) ?>
										</a>
									</td>												
								</tr>
							<?php } } ?>
						</tbody>
					</table>
				</div>
			</section>
		</div>

		<div class="col-md-4 col-sm-12 col-xs-12">
			<section class="panel panel-primary">
				<header class="panel-heading panel-warning">
					<h2 class="panel-title">Calendar</h2>
				</header>
				<div id="tabla_actividades_prioridad" class="panel-body">
					<table id="datatable-prioridades_" class="table table-bordered table-striped mb-none" >
						<thead class="hidden">
							<tr>
								<th width="70%">Activity</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ( $todas_actividades as $a ) { 
									if( $a["estado"] == "agendada" ){
							?>
								<tr class="gradeX">
									<td>
										<a href="#actividad-historial" class="info_hist modal-sizes modal-with-zoom-anim" 
										data-ida="<?php echo $a["id_act"] ?>">
											<?php echo infoActSO( $a ) ?>
										</a> 
									</td>												
								</tr>
							<?php } } ?>
						</tbody>
					</table>
				</div>
			</section>
		</div>

		<div class="col-md-4 col-sm-12 col-xs-12">
			<section class="panel panel-primary">
				<header class="panel-heading panel-warning">
					<h2 class="panel-title">History</h2>
				</header>
				<div id="tabla_actividades_prioridad" class="panel-body">
					<table id="datatable-prioridades_" class="table table-bordered table-striped mb-none" >
						<thead class="hidden">
							<tr>
								<th width="70%">Activity</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ( $todas_actividades as $a ) { 
									if( $a["estado"] == "finalizada" ){
							?>
								<tr class="gradeX">
									<td>
										<a href="#actividad-historial" class="info_hist modal-sizes modal-with-zoom-anim" 
										data-ida="<?php echo $a["id_act"] ?>">
											<?php echo infoActSO( $a ) ?>
										</a>
									</td>												
								</tr>
							<?php } } ?>
						</tbody>
					</table>
				</div>
			</section>
		</div>

		<?php include( "secciones/data-actividad-esquema.php" ); ?>
	</div>
</section>

