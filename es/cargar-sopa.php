<?php
    /*
     * TFE Life Planner - Cargar S.O.P.A.
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-area.php" );
    include( "database/data-sujeto.php" );
    include( "database/data-objeto.php" );
    include( "database/data-sujeto-objeto.php" );
    include( "database/data-proposito.php" );
    include( "database/data-actividad.php" );
    
    include( "fn/fn-forms.php" );
    include( "fn/fn-sopa.php" );
    include( "fn/fn-actividad.php" );
    
    checkSession( "" );
    $titulo_pagina = "Cargar fórmula S.O.P.A";
    $breadcrumb = $titulo_pagina;
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title><?php echo $titulo_pagina ?> | TFE Life Planner</title>
		<?php include( "secciones/meta-tags.html" );?>

		<?php include( "secciones/include-css.html" );?>
		<link rel="stylesheet" href="../assets/vendor/jstree/themes/default/style.css" />
		
		<style type="text/css">
			#agg_objeto, #agg-s-o, .campos_act{ display: none; }
			.icon_obj{ font-family: Arial; color: #fff; font-size: 14px; margin-left: 10px; }
			.nopa{ background-color: transparent; }
			.item_obj{ background-color: #509E2D }
			.item_pro{ background-color: #2762B7 }
			.item_act{ background-color: #e25522 }
			.ley_o{ color: #509E2D; }
			.ley_p{ color: #2762B7; }
			.ley_a{ color: #e25522; }
			.dd-handle{ color: #fff; }
			.editableicon{ float: right; } 
			.i_edit_act, .i_edit_prop{ color: #FFF; }
			.elim_actividad, .elim_prop, .elim_so{ color: #fff; }
			.elim_prop:hover{ text-decoration: none; }
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
						<div class="col-md-4 col-sm-6 col-xs-12">
							<?php 
								if( isset( $init_area ) )
									include( "secciones/sopa/panel_sujeto_objeto.php" );
								if( isset( $s_o ) ) 
									include( "secciones/sopa/panel_sesion_so.php" );
							?>
						</div>
						<?php if( isset( $s_o ) ) { ?>
						<div class="col-md-8 col-sm-6 col-xs-12">
							<section id="arbol_opa" class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Proovedores - Actividades</h2>
									<p class="panel-subtitle">
										<i class="fa fa-puzzle-piece ley_o" aria-hidden="true"></i> 
										<span class="ley_o">Objetos</span> | 
										<i class="fa fa-crosshairs ley_p" aria-hidden="true"></i> 
										<span class="ley_p">Proovedores</span> |
										<i class="fa fa-thumb-tack ley_a" aria-hidden="true"></i> 
										<span class="ley_a">Actividades</span>
									</p>
								</header>
								<div class="panel-body">
									<?php include( "secciones/sopa/panel_opa.php" ); ?>
								</div>
								<input type="hidden" id="id-so-elim" value="">
								<input type="hidden" id="id-actividad-e" value="">			
								<input type="hidden" id="id-proposito-e" value="">
							</section>
						</div>
						<?php } ?>
					</div>	
				</section>
			</div>
		</section>
		<?php include( "secciones/notificaciones/confirmar-accion.html" );?>

		<?php include( "secciones/include-js.html" ); ?>

		<script src="../assets/vendor/select2/select2_locale_es.js"></script>
		<script src="../assets/vendor/jquery-nestable/jquery.nestable.js"></script>
		<script src="../assets/vendor/jstree/jstree.js"></script>

		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
		<?php if( isset( $s_o ) ) { ?>
		<script src="../assets/javascripts/ui-elements/examples.nestable.js"></script>
		<?php } ?>
		
		<script src="js/init.modals.js"></script>
		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-area.js"></script>
		<script src="js/fn-sujeto.js"></script>
		<script src="js/fn-objeto.js"></script>
		<script src="js/fn-sujeto-objeto.js"></script>
		<script src="js/fn-proposito.js"></script>
		<script src="js/fn-actividad.js"></script>
		<script src="js/validate-extend.js"></script>
		
		<?php if( isset( $s_o ) ) { ?>
			<script>  bloquearListasAreaSujeto(); </script>
		<?php } ?>
		
	</body>
</html>