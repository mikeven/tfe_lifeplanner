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
    $titulo_pagina = "Áreas";

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
										<h2 class="panel-title">Agregar área</h2>
									</header>
									<div class="panel-body">
										<p class="p_inst">Escriba un nombre para el área nueva</p>
										
										<div class="row form-group">
											<div class="col-lg-12">
												<input id="areanombre" type="text" name="nombre" placeholder="Nombre" class="form-control" required>
											</div>
										</div>
										<hr>
										<p class="p_inst">Áreas sugeridas</p>
										<a href="#!" class="sug_area">Documentos personales</a><br>
										<a href="#!" class="sug_area">Entretenimiento</a><br>
										<a href="#!" class="sug_area">Familia</a><br>
										<a href="#!" class="sug_area">Finanzas</a><br>
										<a href="#!" class="sug_area">Hobbies</a><br>
										<a href="#!" class="sug_area">Hogar</a><br>
										<a href="#!" class="sug_area">Imagen personal</a><br>
										<a href="#!" class="sug_area">Imprevistos</a><br>
										<a href="#!" class="sug_area">Labor social</a><br>
										<a href="#!" class="sug_area">Mascotas</a><br>
										<a href="#!" class="sug_area">Mejoramiento personal</a><br>
										<a href="#!" class="sug_area">Mejoramiento profesional</a><br>
										<a href="#!" class="sug_area">Oficina</a><br>
										<a href="#!" class="sug_area">Proyectos</a><br>
										<a href="#!" class="sug_area">Publicidad y Mercadeo</a><br>
										<a href="#!" class="sug_area">Relaciones sociales</a><br>
										<a href="#!" class="sug_area">Salud emocional</a><br>
										<a href="#!" class="sug_area">Salud espiritual</a><br>
										<a href="#!" class="sug_area">Salud física</a><br>
										<a href="#!" class="sug_area">Trabajo</a><br>
										<a href="#!" class="sug_area">Vehículos</a><br>
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
									<h2 class="panel-title">Áreas registradas</h2>
								</header>
								<div id="tabla_areas" class="panel-body">
									<table id="datatable-default"
									class="table table-bordered table-striped mb-none" >
										<thead>
											<tr>
												<th width="30%">Nombre</th>
												<th width="20%">Acciones</th>
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
												<i class="fa fa-edit"></i> Editar</a>
												</td>
												<td>
													<a href="#confirmar-accion" 
													class="modal-with-zoom-anim elim_area" 
													data-ida="<?php echo $a["id"] ?>">
														<i class="fa fa-trash-o"></i> Eliminar
													</a>
												</td>
												<td>
													<a href="cargar-sopa.php?id_area=<?php echo $a["id"] ?>">
														<i class="fa fa-database"></i> 
														Cargar S.O.P.A.
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
		<script src="js/validate-extend.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/init.modals.js"></script>
		
	</body>
</html>