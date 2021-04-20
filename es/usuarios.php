<?php
    /*
     * TFE Life Planner - Usuarios
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-admin.php" );

    checkSession( "" );
    $titulo_pagina = "Usuarios";

    $idu = $_SESSION["user"]["id"];
    $usuarios = obtenerListaUsuariosRegistrados( $dbh );
    $breadcrumb = $titulo_pagina;
    soloAdmin();
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title><?php echo $titulo_pagina ?> | SOPA Life Planner</title>
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
						
						<div class="col-md-12 col-sm-12 col-xs-12">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Usuarios registrados</h2>
								</header>
								<div id="tabla_areas" class="panel-body">
									<table id="datatable-default"
									class="table table-bordered table-striped mb-none" >
										<thead>
											<tr>
												<th width="20%">Nombre</th>
												<th width="20%">Apellido</th>
												<th width="20%">Email</th>
												<th width="20%">Fecha de registro</th>
												<th width="20%">Fecha último ingreso</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ( $usuarios as $u ) { ?>
											<tr class="gradeX">
												<td><?php echo $u["nombre"] ?></td>
												<td><?php echo $u["apellido"] ?></td>
												<td><?php echo $u["email"] ?></td>
												<td><?php echo $u["fregistro"] ?></td>
												<td><?php echo $u["fultimo_ingreso"] ?></td>
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