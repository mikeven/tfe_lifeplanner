<?php
    /*
     * TFE Life Planner - Áreas
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-area.php" );
    checkSession( "" );
    $titulo_pagina = "Areas";

    $idu = $_SESSION["user"]["id"];
    $areas = obtenerListaAreas( $dbh, $idu );
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
						<div class="col-md-4 col-sm-6 col-xs-12">
							<section class="panel">
								<form id="frm_narea" class="form-horizontal">
									<input type="hidden" name="idu" value="<?php echo $idu?>">
									<header class="panel-heading">
										<h2 class="panel-title">Add an area</h2>
									</header>
									<div class="panel-body">
										<p class="p_inst">Enter a name for a new area</p>
										
										<div class="row form-group">
											<div class="col-lg-12">
												<input type="text" name="nombre" placeholder="Name" class="form-control" required>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" type="submit">Add</button>
									</footer>
								</form>
							</section>
						</div>
						<div class="col-md-8 col-sm-6 col-xs-12">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Registered areas</h2>
								</header>
								<div id="tabla_areas" class="panel-body">
									<table id="datatable-default"
									class="table table-bordered table-striped mb-none" >
										<thead>
											<tr>
												<th width="30%">Name</th>
												<th width="20%">Actions</th>
												<th width="20%"></th>
												<th width="30%"></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ( $areas as $a ) { ?>
											<tr class="gradeX">
												<td><?php echo $a["nombre"] ?></td>
												<td>
													<a href="editar-area.php?id=<?php echo $a["id"]?>">
												<i class="fa fa-edit"></i> Edit</a>
												</td>
												<td>
													<a href="#confirmar-accion" 
													class="modal-with-zoom-anim elim_area" 
													data-ida="<?php echo $a["id"] ?>">
														<i class="fa fa-trash-o"></i> Delete
													</a>
												</td>
												<td>
													<a href="cargar-sopa.php?id_area=<?php echo $a["id"] ?>">
														<i class="fa fa-database"></i> 
														Create S.O.P.A.
													</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
									<?php 
									include( "secciones/notificaciones/confirmar-accion.html" );?>
								</div>
							</section>
							<input id="id-area-e" type="hidden">
						</div>
					</div>

				</section>
			</div>
			
		</section>

		<?php include( "secciones/include-js.html" );?>

		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-area.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/init.modals.js"></script>
		
	</body>
</html>