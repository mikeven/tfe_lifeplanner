<?php
    /*
     * TFE Life Planner - Editar área
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-area.php" );
    checkSession( "" );
    $titulo_pagina = "Edit area";

    $idu = $_SESSION["user"]["id"];
    if( isset( $_GET["id"] ) ){
        $ida = $_GET["id"];
        $area = obtenerAreaPorId( $dbh, $ida );
    }
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
								<form id="frm_edit_area" class="form-horizontal">
									<input type="hidden" name="id" 
									value="<?php echo $area['id']?>">
									<header class="panel-heading">
										<h2 class="panel-title">Edit area name</h2>
									</header>
									<div class="panel-body">
										<p class="p_inst">Enter a new name for this area</p>
										<div class="row form-group">
											<div class="col-lg-12">
												<input type="text" name="nombre" placeholder="Name" class="form-control" required 
												value="<?php echo $area['nombre']?>">
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" type="submit">Save</button>
									</footer>
								</form>
							</section>
						</div>
					</div>
				</section>
			</div>
		</section>

		<?php include( "secciones/include-js.html" );?>
		
		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
		
		<script src="js/init.modals.js"></script>
		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-area.js"></script>
		<script src="js/validate-extend.js"></script>
		
	</body>
</html>