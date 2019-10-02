<?php
    /*
     * TFE Life Planner - Ficha actividad sujeto-objeto
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-sopa.php" );
    include( "database/data-sujeto-objeto.php" );
    include( "database/data-actividad.php" );
    include( "database/data-proposito.php" );

    include( "fn/fn-actividad.php" );
    include( "fn/fn-sujeto-objeto.php" );
    checkSession( "" );
    
    $idu = $_SESSION["user"]["id"];
    if( isset( $_GET["ids"], $_GET["ido"] ) ){
        $ids = $_GET["ids"];	$ido = $_GET["ido"];
        $reg_so = obtenerSujetoObjetoPorids( $dbh, $ids, $ido );
        $propositos = obtenerPropositosSujetoObjeto( $dbh, $ids, $ido );

        $indice = obtenerIndiceSOPAPorUsuario( $dbh, $idu );
        $so_ant_sig = obtenerSOAntSig( $indice, $ids, $ido );
        $lnk_gestion_pa = "cargar-sopa.php?ids=$ids&ido=$ido";
    }
    $titulo_pagina = $reg_so["nsujeto"]." - ".$reg_so["nobjeto"];
    $breadcrumb = $titulo_pagina;
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title><?php echo $titulo_pagina ?> | TFE Life Planner</title>
		<?php include( "secciones/meta-tags.html" );?>

		<?php include( "secciones/include-css.html" );?>
		
		<style type="text/css">
			.icono-tarea {
			    font-size: 25px !important;
			    font-size: 2.2rem;
			    width: 40px !important;
			    height: 40px !important;
			    line-height: 40px !important;
			}
			.info-act, .act_sesion{ margin-left: 35px; }
			
			#panel_act_prop, .data_act_info, .btn_priord, 
			#act_prioridad, #fecha_act_agenda{ display: none; }

			.accord_act_cont{ margin-left: 25px; }
			#act_prioridad, #act_agendada{ float: right; color: yellow; }
			.btn_gpa a{ color: #FFF; }

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
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php 
								include( "secciones/sopa/panel_propositos_so.php" ); 
							?>
						</div>

						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php 
								include( "secciones/sopa/panel_actividades_proposito.php" ); 
							?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<?php include( "secciones/sopa/nav_sujetos_objetos.php" ); ?>
						</div>
					</div>

				</section>
			</div>
		</section>

		<?php include( "secciones/include-js.html" ); ?>

		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-actividad.js"></script>
		<script src="js/validate-extend.js"></script>
		
	</body>
</html>