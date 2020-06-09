<?php
    /*
     * TFE Life Planner - Historial por fechas
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-actividad.php" );

    include( "fn/fn-actividad.php" );
    
    checkSession( "" );
    $titulo_pagina = "Historial general";

    $idu = $_SESSION["user"]["id"];
    $historial = obtenerHistorial( $dbh, $idu );
    $breadcrumb = $titulo_pagina;
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title><?php echo $titulo_pagina ?> | TFE Life Planner</title>
		<?php include( "secciones/meta-tags.html" );?>

		<?php include( "secciones/include-css.html" );?>

		<style>
			#icono_actividad{ color: #FFF; }
			#edicion_resultado{ display: none; }
		</style>
	</head>
	
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include( "secciones/header.php" ); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include( "secciones/navegacion.php" ); ?>
				<!-- end: sidebar -->
				<section role="main" class="content-body">
					<?php include( "secciones/titulo_pagina.php" ); ?>

					<div class="row">
						
						<div class="col-md-8 col-sm-8 col-xs-12">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">
										<?php echo $titulo_pagina ?>
									</h2>
								</header>
								<div id="tabla_actividades_prioridad" class="panel-body">
									<table id="datatable-historial"
									class="table table-bordered table-striped mb-none thist">
										<thead>
											<tr>
												<th>Fecha</th>
												<th>Actividad</th>
												<th>Resultado</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ( $historial as $h ) { ?>
											<tr class="gradeX">
												<td> <?php echo $h["fcalendario"] ?> </td>
												<td> 
													<a href="#actividad-historial" class="info_hist modal-sizes modal-with-zoom-anim" data-ida="<?php echo $h["id_act"] ?>">
														<?php echo infoPrioridad( $h ) ?>
													</a> 
												</td>
												<td> <?php echo $h["resultado"] ?> </td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
									
								</div>
							</section>
						</div>

					</div>

				</section>
			</div>
			<?php include( "secciones/data-actividad-hist.php" ); ?>
		</section>

		<?php include( "secciones/include-js.html" ); ?>
		<script src="js/init.modals.js"></script>
		
		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-actividad.js"></script>
		<script src="js/validate-extend.js"></script>
		<script type="text/javascript">
			var table = $('#datatable-historial').DataTable();
		</script>
		
	</body>
</html>