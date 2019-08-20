<section class="panel">
	<form id="frm_sujeto_objeto">
		<header class="panel-heading">
			<h2 class="panel-title">Sujeto - Objeto</h2>
		</header>
		<input type="hidden" name="idu" value="<?php echo $idu ?>">
		<input type="hidden" name="idsesion" value="<?php echo $idsesion ?>">
		<div class="panel-body">
			<?php if( !isset( $carga_so ) ) { ?>
			<div class="form-group">
				<label class="control-label">Área</label>
				<select id="lareas" class="form-control" required>
					<option value=""></option>
					<?php foreach ( $areas as $a ) { ?>
					<option value="<?php echo $a["id"] ?>" 
						<?php echo sop( $a["id"], $ida ) ?>><?php echo $a["nombre"] ?>
					</option>
					<?php } ?>
				</select>
				<input type="hidden" name="idarea" value="<?php echo $ida ?>">
			</div>
			
			<div class="form-group">
				<label class="control-label">Sujeto</label>
				<select id="lsujetos" class="form-control" required >
					<option value=""></option>
					<?php foreach ( $sujetos_a as $s ) { ?>
						<option value="<?php echo $s["id"] ?>" 
							<?php echo sop( $s["id"], $ids ) ?>><?php echo $s["nombre"] ?>
						</option>
					<?php } ?>
				</select>
				<input type="hidden" name="idsujeto" value="<?php echo $ids?>">
			</div>
			<hr>
			<div id="agg_objeto" class="form-group">
				<label class="control-label">Objeto</label>
				<table width="100%">
					<th width="80%">
						<select id="lobjetos" class="form-control" required name="idobjeto">
							<option value=""></option>
							<?php foreach ( $objetos_s as $o ) { ?>
								<option value="<?php echo $o["id"] ?>">
									<?php echo $o["nombre"] ?>
								</option>
							<?php } ?>
						</select>
					</th>
					<th width="20%" style="text-align: right;">
						<a href="#frm-objeto" class="modal-sizes modal-with-zoom-anim" 
						data-toggle="tooltip" data-placement="top" 
						title="Crear nuevo Objeto">
						<button type="button" class="mb-xs mt-xs mr-xs btn btn-obj">
							<i class="fa fa-plus"></i> 
						</button>
						</a>
					</th>
				</table>
			</div>
			<?php } else { ?>
				<div class="form-group">
					<label class="control-label">Sujeto</label>
					<select id="lsujetos" class="form-control" required >
						<option value="<?php echo $ids ?>">
							<?php echo $s_o[0]["nsujeto"] ?>
						</option>
					</select>
					<input type="hidden" name="idsujeto" value="<?php echo $ids?>">
				</div>
				<div class="form-group">
					<label class="control-label">Objeto</label>
					<select id="lobjetos" class="form-control" required disabled>
						<option value="<?php echo $ido ?>">
							<?php echo $s_o[0]["nobjeto"] ?>
						</option>
					</select>
					<input type="hidden" name="idsujeto" value="<?php echo $ids?>">
				</div>
			<?php } ?>	
		</div>
		<?php if( !isset( $carga_so ) ) { ?>
		<footer id="agg-s-o" class="panel-footer">
			<button type="submit" class="mb-xs mt-xs mr-xs btn btn-obj">
				Agregar propósitos <i class="fa fa-arrow-right"></i>
			</button>
		</footer>
		<?php } ?>
	</form>
</section>
<?php include( "secciones/sopa/frm-sujeto.php" ); ?>
<?php include( "secciones/sopa/frm-objeto.php" ); ?>