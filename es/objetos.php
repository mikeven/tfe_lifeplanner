<?php
    /*
     * TFE Life Planner - Objetivos
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-objeto.php" );
    checkSession( "" );
    $titulo_pagina = "Objetivos";

    $idu = $_SESSION["user"]["id"];
    $objetos = obtenerListaObjetos( $dbh, $idu );
    $breadcrumb = $titulo_pagina;
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title><?php echo $titulo_pagina ?> | TFE Life Planner</title>
		<?php include( "secciones/meta-tags.html" );?>

		<?php include( "secciones/include-css.html" ); ?>
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
						<div class="col-md-4 col-sm-6 col-xs-12 hidden">
							<section class="panel">
								<form id="frm-nuevo-objeto" class="form-horizontal">
									<input type="hidden" name="idu" value="<?php echo $idu?>">
									<header class="panel-heading">
										<h2 class="panel-title">Agregar objetivo</h2>
									</header>
									<div class="panel-body">
										<p class="p_inst">Escriba un nombre para el objetivo nuevo</p>
										
										<div class="row form-group">
											<div class="col-lg-12">
												<input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" type="submit">Agregar</button>
									</footer>
								</form>
							</section>
						</div>
						<div class="col-md-8 col-sm-6 col-xs-12">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Objetivos registrados</h2>
								</header>
								<div id="tabla_objetos" class="panel-body">
									<table id="datatable-default"
									class="table table-bordered table-striped mb-none" >
										<thead>
											<tr>
												<th width="50%">Nombre</th>
												<th width="20%">Editar</th>
												<th width="30%">Eliminar</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ( $objetos as $o ) { ?>
											<tr class="gradeX">
												<td><?php echo $o["nombre"] ?></td>
												<td>
													<a href="editar-objeto.php?id=<?php echo $o["id"]?>">
												<i class="fa fa-edit"></i> Editar</a>
												</td>
												<td>
													<a href="#confirmar-accion" 
													class="modal-sizes modal-with-zoom-anim elim_objeto" 
													data-ido="<?php echo $o["id"] ?>">
														<i class="fa fa-trash-o"></i> Eliminar
													</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</section>
							<?php include( "secciones/notificaciones/confirmar-accion.html" );?>
							<input id="id-objeto-e" type="hidden">
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

		<script src="js/init.modals.js"></script>
		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-objeto.js"></script>
		<script src="js/validate-extend.js"></script>
		
	</body>
</html>