<section id="panel_act_prop" class="panel panel-warning">
	<header class="panel-heading">
		<h2 class="panel-title">
			<i id="icono_actividad" class="fa"></i> |
			<strong >Activity:</strong>
			<span id="tx_act"> </span>
			<div id="act_prioridad"><i class="fa fa-star"></i></div>
			<div id="act_agendada"><i class="fa fa-calendar"></i></div>
		</h2>
	</header>
	<div class="panel-body">
		<div class="widget-summary">
			
			<div class="widget-summary-col">
				<div class="summary">
		
					<div class="info">
						<i class="fa fa-crosshairs"></i>
						<strong >Provider:</strong>
						<span id="tx_prop_act"> </span>
					</div>
					
					<div class="info">
						<div id="info-g" class="data_act_info">
							<div> 
								<b>Place: </b> <span id="act_lugar"></span> 
							</div>
							<div> 
								<b>Address: </b> <span id="act_dir"></span> 
							</div>
							<div> 
								<b>Task: </b> <span id="act_tarea_g"></span> 
							</div>
						</div>
						<div id="info-e" class="data_act_info">
							<div> 
								<b>Task: </b> <span id="act_tarea_e"></span> 
							</div>
						</div>
						<div id="info-l" class="data_act_info">
							<div> 
								<b>Contact: </b> <span id="act_contacto"></span> 
							</div>
							<div> 
								<b>Motive: </b> <span id="act_motivo"></span> 
							</div>
						</div>
					</div>
				</div>
				<div class="summary-footer">
					<a href="#!" id="dar_p" class="btn_priord" data-ida="">
						<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
							<i class="fa fa-star"></i> Priority
						</button>
					</a>
					<a href="#!" id="quitar_p" class="btn_priord" data-ida="">
						<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
							<i class="fa fa-star"></i> Remove Priority
						</button>
					</a>
					<span id="fecha_act_agenda"></span>
				</div>
			</div>
		</div>
	</div>
</section>