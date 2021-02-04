<div id="actividad-calendario" class="modal-block modal-block-primary mfp-hide">
	<section id="panel_act_prop" class="panel panel-warning">
		<header class="panel-heading ph-icono-act">
			<h2 class="panel-title">
				<i id="icono_actividad" class="fa fa-act"></i> |
				<strong ><span id="tx_act"> </span></strong>
				<div id="act_agendada"><i class="fa fa-calendar"></i></div>
			</h2>
		</header>
		<div class="panel-body">
			<div class="widget-summary">
				<div class="widget-summary-col">
					<div class="summary">
						<div class="info">
							<i class="fa fa-flag-o"></i>
							<strong >Sujeto:</strong>
							<span id="tx_sujeto_act"> </span>
						</div>

						<div class="info">
							<i class="fa fa-puzzle-piece"></i>
							<strong >Objetivo:</strong>
							<span id="tx_objeto_act"> </span>
						</div>
			
						<div class="info">
							<i class="fa fa-crosshairs"></i>
							<strong >Proveedor:</strong>
							<span id="tx_prop_act"> </span>
						</div>
						
						<div class="info">
							<div id="info-g" class="data_act_info">
								<div> 
									<b>Lugar: </b> <span id="act_lugar"></span> 
								</div>
								<div> 
									<b>Dirección: </b> <span id="act_dir"></span> 
								</div>
								<div> 
									<b>Tarea: </b> <span id="act_tarea_g"></span> 
								</div>
							</div>
							<div id="info-e" class="data_act_info">
								<div> 
									<b>Tarea: </b> <span id="act_tarea_e"></span> 
								</div>
							</div>
							<div id="info-l" class="data_act_info">
								<div> 
									<b>Contacto: </b> <span id="act_contacto"></span> 
								</div>
								<div> 
									<b>Motivo: </b> <span id="act_motivo"></span> 
								</div>
							</div>
							<div>
								<span id="fecha_act_agenda"></span> 
							</div>
							<div>
								<a id="editar_hora" href="#!">
									<i class="fa fa-clock-o"></i> Editar hora
								</a>
							</div>
							<div id="frm_edithora">
								<form id="frm_edit_hora_act">
									<span class="">Hora de tarea</span>
									<div class="input-group mb-md">
										<input id="nueva_hora" type="text" 
										data-plugin-timepicker class="form-control" 
										data-plugin-options='{ "showMeridian": false }'>
										<span class="input-group-btn">
											<button id="cnf_edithora" class="btn btn-success" 
											type="button" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
												<i class="fa fa-check"></i>
											</button>
										</span>
										<input type="hidden" id="ida_nvahora" value="">
										<input type="hidden" id="fecha_act_cal" value="">
									</div>
								</form>	
							</div>
						</div>
					</div>
					<div class="summary-footer">
						<div id="opc_repetir_act">
							<p class="subt_accion panel-subtitle">Repetir actividad</p>
							<a id="repetir_act" href="#!">
								<button type="button" class="btn btn-default">
									<i class="fa fa-repeat"></i> Repetir
								</button>
							</a>
						</div>
						<div id="repetir_actividad">
							<form id="frm_repetiract">
								<div class="form-group">
									<h4 class="col-md-12 control-label tit_fin_act">Repetir actividad</h4>
								</div>
								<div class="form-group">
									<label class="col-md-5 control-label" for="textareaDefault">Frecuencia</label>
									<div class="col-md-7">
										<select id="freq_rep_act" class="form-control valid" name="frecuencia_rep" required>
											<option value="" selected>Seleccione</option>
											<option value="Semanal">Semanal</option>
											<option value="Mensual">Mensual</option>
											<option value="Fechas">Por fechas</option>
										</select>
									</div>
								</div>
								<hr>
								<!-- ---------------------------------- -->
								<div class="form-group opc_repeticiones" id="num_repeticiones_semanal">
									<label class="col-md-5 control-label" for="textareaDefault">Número de repeticiones</label>
									<div class="col-md-7">
										<div class="btn-group">
											<button type="button" class="btn btn-default nro_rep_frq">1</button>
											<button type="button" class="btn btn-default nro_rep_frq">2</button>
											<button type="button" class="btn btn-default nro_rep_frq">3</button>
											<button type="button" class="btn btn-default nro_rep_frq">4</button>
											<button type="button" class="btn btn-default nro_rep_frq">5</button>
										</div>
										<input type="hidden" name="nrepeticiones" id="val_nrepeticiones">
									</div>
								</div>
								<!-- ---------------------------------- -->
								<div class="form-group opc_repeticiones" id="num_repeticiones_mensual">
									<label class="col-md-5 control-label" for="textareaDefault">Número de repeticiones</label>
									<div class="col-md-7">
										<div class="btn-group">
											<button type="button" class="btn btn-default nro_rep_frq">1</button>
											<button type="button" class="btn btn-default nro_rep_frq">2</button>
											<button type="button" class="btn btn-default nro_rep_frq">3</button>
											<button type="button" class="btn btn-default nro_rep_frq">4</button>
											<button type="button" class="btn btn-default nro_rep_frq">5</button>
											<button type="button" class="btn btn-default nro_rep_frq">6</button>
											<button type="button" class="btn btn-default nro_rep_frq">7</button>
											<button type="button" class="btn btn-default nro_rep_frq">8</button>
											<button type="button" class="btn btn-default nro_rep_frq">9</button>
											<button type="button" class="btn btn-default nro_rep_frq">10</button>
											<button type="button" class="btn btn-default nro_rep_frq">11</button>
											<button type="button" class="btn btn-default nro_rep_frq">12</button>
										</div>
										<input type="hidden" name="nrepeticiones" id="val_nrepeticiones">
									</div>
								</div>
								<!-- ---------------------------------- -->
								<div class="form-group opc_repeticiones" id="fechas_repeticiones">
									<div class="col-md-5" style="padding-bottom: 16px;">
										<label class="control-label" for="textareaDefault">Agregar fechas para esta actividad</label>
										<a class="agg_fecha_repeticion" href="#!">
											<button type="button" class="btn btn-default"><i class="fa fa-plus"></i></button>
										</a>
										<input id="nfechas_rep" type="hidden" value="1">
									</div>
									<div id="fechas_repeticion_actividad" class="col-md-7">
										<div id="rf1" class="bloque_sel_fecha">
											<div class="col-md-10 col-xs-10 mmxx">
												<div class="input-group grupo_campo_fecha">
													<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
													<input type="text" required data-plugin-datepicker 
													class="form-control fecha_repeticion" name="fecha_cal">
												</div>
											</div>
											<div class="col-md-2 col-xs-2 mmxx">
												<a id="df1" class="del_fecha_repeticion" href="#!" data-num="1">
													<button type="button" class="btn btn-default">
														<i class="fa fa-times icon_del_fecha"></i>
													</button>
												</a>
											</div>
										</div>
									</div>
									
								</div>
								<div id="proyeccion_fechas" class="form-group opc_repeticiones">
									<div class="col-md-5"> Fechas proyectadas:</div>
									<div id="data_fechas_proyectadas" class="col-md-7"></div>
								</div>
								<hr>
								<!-- ---------------------------------- -->
								
								<div>
									<div id="response_repetir_actividad" class="col-sm-9 col-sm-offset-3">
										<a id="confirmar_repetir_act" href="#!">
											<button type="button" class="btn btn-primary">Guardar</button>
										</a>
									</div>
								</div>
							</form>
						</div>
						<hr>
						<!-- ------------------------------------------------------------------------- -->
						<div>
							<p class="subt_accion panel-subtitle">Quitar actividad del calendario</p>
							<a id="desagendar_act" href="#!">
								<button type="button" class="btn btn-default">
									<i class="fa fa-calendar-times-o"></i> Desagendar
								</button>
							</a>
						</div>
						
						<div id="confirmacion_desagendar">
							<a id="confirmar_desagendar_act" href="#!">
								<button type="button" class="btn btn-danger">Confirmar</button>
							</a> o 
							<a id="cancelar_desagendar_act" href="#!">
								Cancelar 
							</a>
						</div>
						<hr>
						<!-- ------------------------------------------------------------------------- -->
						<div id="finalizar_act">
							<p class="subt_accion panel-subtitle">Marcar actividad finalizada</p>
							<a id="finalizar_act" href="#!">
								<button type="button" class="btn btn-success">
									<i class="fa fa-check"></i> Finalizar
								</button>
							</a>
						</div>
						<div id="confirmar_finalizacion">
							<form id="frm_finalizaract">
								<div class="form-group">
									<h4 class="col-md-12 control-label tit_fin_act">Migrar actividad a historial</h4>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="textareaDefault">Resultado</label>
									<div class="col-md-9">
										<textarea name="resultado" class="form-control" rows="3" id="textareaDefault" required></textarea>
									</div>
									<input id="id_actfinalizar" type="hidden" name="id_actfin">
								</div>
								<div >
									<div class="col-sm-9 col-sm-offset-3">
										<a id="confirmar_finalizar_act" href="#!">
											<button type="submit" class="btn btn-primary">Finalizar</button>
										</a>
									</div>
								</div>
							</form>
						</div>
						<!-- ------------------------------------------------------------------------- -->
					</div>
				</div>
			</div>			
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button id="cl_data_desag_act" class="btn btn-default modal-dismiss">Cerrar</button>
				</div>
			</div>
		</footer>
	</section>
</div>