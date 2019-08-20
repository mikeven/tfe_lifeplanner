<?php
    /*
     * TFE Life Planner - Prioridades
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-actividad.php" );

    include( "fn/fn-actividad.php" );
    
    checkSession( "" );
    $titulo_pagina = "Prioridades";

    $idu = $_SESSION["user"]["id"];
    $prioridades = obtenerPrioridades( $dbh, $idu );
    $breadcrumb = $titulo_pagina;
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title><?php echo $titulo_pagina ?> | TFE Life Planner</title>
		<?php include( "secciones/meta-tags.html" );?>

		<?php include( "secciones/include-css.html" );?>
		<link rel="stylesheet" href="../assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css"/>

		<style>
			.datepicker{ z-index:99999 !important; }
			.isuccess .fa{ color: #47a447 !important; }
			.iwarning .fa{ color: #ed9c28 !important; }
			.idanger .fa{ color: #d2322d !important; }
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
						
						<div class="col-md-4 col-sm-12 col-xs-12">
							<section class="panel panel-success">
								<header class="panel-heading panel-warning">
									<h2 class="panel-title"><?php echo iconoActividad('g')?> Gestión</h2>
									<p class="panel-subtitle">Haga clic en una prioridad para agendarla</p>
								</header>
								<div id="tabla_actividades_prioridad" class="panel-body">
									<table id="datatable-prioridades_"
									class="table table-bordered table-striped mb-none" >
										<thead class="hidden">
											<tr>
												<th width="70%">Actividad</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ( $prioridades['g'] as $a ) { ?>
											<tr class="gradeX">
												<td>
													<a href="#frm-actividad-cal" 
													class="modal-sizes modal-with-zoom-anim act_prior_cal" 
													data-ida="<?php echo $a["id_act"] ?>" 
													data-desc="<?php infoPrioridadForm( $a ) ?>">
														<?php infoPrioridad( $a ) ?>
													</a>
												</td>												
											</tr>
											<?php } ?>
										</tbody>
									</table>
									
								</div>
							</section>
						</div>

						<div class="col-md-4 col-sm-12 col-xs-12">
							<section class="panel panel-danger">
								<header class="panel-heading">
									<h2 class="panel-title"><?php echo iconoActividad('e')?> Escritorio</h2>
									<p class="panel-subtitle">Haga clic en una prioridad para agendarla</p>
								</header>
								<div id="tabla_actividades_prioridad" class="panel-body">
									<table id="datatable-prioridades_"
									class="table table-bordered table-striped mb-none" >
										<thead class="hidden">
											<tr>
												<th width="70%">Actividad</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ( $prioridades['e'] as $a ) { ?>
											<tr class="gradeX">
												<td>
													<a href="#frm-actividad-cal" 
													class="modal-sizes modal-with-zoom-anim act_prior_cal" 
													data-ida="<?php echo $a["id_act"] ?>" 
													data-desc="<?php infoPrioridadForm( $a ) ?>">
														<?php infoPrioridad( $a ) ?>
													</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
									
								</div>
							</section>
						</div>

						<div class="col-md-4 col-sm-12 col-xs-12">

							<section class="panel panel-warning">
								<header class="panel-heading">
									<h2 class="panel-title"><?php echo iconoActividad('l')?> Llamada</h2>
									<p class="panel-subtitle">Haga clic en una prioridad para agendarla</p>
								</header>
								<div id="tabla_actividades_prioridad" class="panel-body">
									<table id="datatable-prioridades_"
									class="table table-bordered table-striped mb-none" >
										<thead class="hidden">
											<tr>
												<th width="70%">Actividad</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ( $prioridades['l'] as $a ) { ?>
											<tr class="gradeX">
												<td>
													<a href="#frm-actividad-cal" 
													class="modal-sizes modal-with-zoom-anim act_prior_cal" 
													data-ida="<?php echo $a["id_act"] ?>" 
													data-desc="<?php infoPrioridadForm( $a ) ?>">
														<?php infoPrioridad( $a ) ?>
													</a>
												</td>												
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
			<?php include( "secciones/sopa/frm-actividad-cal.php" ); ?>
		</section>

		<?php include( "secciones/include-js.html" ); ?>

		<!-- Vendor -->
		<script src="../assets/vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>
		<script src="../assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="../assets/vendor/fuelux/js/spinner.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="../assets/vendor/pnotify/pnotify.custom.js"></script>

		
		<!-- Theme Initialization Files -->
		<script src="../assets/javascripts/theme.init.js"></script>
		

		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>

		<script src="js/init.modals.js"></script>
		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-actividad.js"></script>
		<script src="js/validate-extend.js"></script>
		<script type="text/javascript">
			/*$.fn.dataTable.moment( 'DD/MM/YY HH:mm A' );
    
		    var table = $('#datatable-prioridades').DataTable();
		    table.order( [ 1, 'asc' ] ).draw();*/

		    $("#fagenda_act").datepicker({
			    isRTL: false,
			    format: 'dd/mm/yyyy',
			    autoclose:true,
			    language: 'es'
			});
		</script>
		
	</body>
</html>