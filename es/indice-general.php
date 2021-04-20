<?php
    /*
     * TFE Life Planner - Índice S.O.P.A.
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-proposito.php" );
    include( "database/data-area.php" );
    include( "database/data-sopa.php" );
    include( "database/data-actividad.php" );

    include( "fn/fn-forms.php" );
    include( "fn/fn-indice-sopa.php" );

    checkSession( "" );

    $titulo_pagina = "Índice General";   
    $breadcrumb = $titulo_pagina;
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title><?php echo $titulo_pagina ?> | TFE Life Planner</title>
		<?php include( "secciones/meta-tags.html" );?>

		<?php include( "secciones/include-css.html" );?>
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
						<div class="col-md-4 col-sm-4 col-xs-12">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Selección de áreas</h2>
								</header>
								<div id="tabla_areas" class="panel-body">
									<select id="lareas_so" class="form-control" name="area" required>
										<option value=""></option>
										<?php foreach ( $areas as $a ) { ?>
										<option value="<?php echo $a['id'] ?>" <?php echo sop( $a["id"], $ida ) ?>>
											<?php echo $a["nombre"] ?>
										</option>
										<?php } ?>
									</select>
								</div>
							</section>
						</div>

						<div class="col-md-8 col-sm-8 col-xs-12">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Índice Sujetos - Objetivos</h2>
								</header>
								<div id="tabla_indice_so" class="panel-body">
									<table id="datatable-default"
									class="table table-bordered table-striped mb-none" >
										<thead>
											<tr>
												<th width="100%">Sujeto // Objetivo</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ( $indice as $i ) {
													if( actPendientes( $dbh, $i ) ) {
											?>
											<tr class="gradeX">
												<td>
													<a href="actividad.php?ids=<?php echo $i["idsujeto"] ?>
													&ido=<?php echo $i["idobjeto"] ?>"> 
														<?php echo $i["nsujeto"]." // ".$i["nobjeto"] ?>
													</a>
												</td>
											</tr>
											<?php 	}
												} ?>
										</tbody>
									</table>
									
								</div>
							</section>
							
						</div>
					</div>

				</section>
			</div>
			
		</section>

		<?php include( "secciones/include-js.html" ); ?>

		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>

		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-area.js"></script>
		<script src="js/validate-extend.js"></script>
		
	</body>
</html>