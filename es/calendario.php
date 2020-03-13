<?php
    /*
     * TFE Life Planner - Calendario
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-actividad.php" );

    include( "fn/fn-actividad.php" );

    checkSession( "" );
    $titulo_pagina = "Calendario";

    $idu = $_SESSION["user"]["id"];
    $breadcrumb = $titulo_pagina;
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title><?php echo $titulo_pagina ?> | TFE Life Planner</title>
		<?php include( "secciones/meta-tags.html" );?>

		<?php include( "secciones/include-css.html" );?>
		
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/fullcalendar/fullcalendar.css" />
		<link rel="stylesheet" href="../assets/vendor/fullcalendar/fullcalendar.print.css" media="print" />
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

		<style type="text/css">
			#selector_act_cal, #frm_edithora{ display: none; } 
			.data_act_info, .btn_priord, #act_prioridad, #fecha_act_agenda, #confirmacion_desagendar, 
			#confirmar_finalizacion, #repetir_actividad, .opc_repeticiones{ display: none; }

			#act_agendada{ float: right; }

			.ph-icono-act .fa, #finalizar_act .fa,  
			#frm_edithora .fa{ color: #FFFFFF !important; }
			
			#desagendar_act .fa{ color: #000 !important;  }

			#act_agendada .fa{ color: yellow !important; }
			#confirmar_desagendar_act, .icon_del_fecha{ color: #d2322d !important;  }

			.subt_accion{ color: #000 !important; float: left; }
			#frm_edithora{ margin-bottom: 50px; }
			#confirmar_finalizacion, #repetir_actividad{ padding: 20px 0 80px 0; background: #f1f1f1; }
			.tit_fin_act{ text-align: center; }
			.datepicker{ z-index:99999 !important; }
			.mmxx{ margin: 5px 0;  }

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
					<section class="panel">
						<div class="panel-body">
							<div class="row">
								
								<div class="col-md-12">
									<input id="id_ssu" type="hidden" name="id_usuario" value="<?php echo $idu ?>">
									<div id="calendar"></div>
								</div>
								
							</div>
							<a id="selector_act_cal" href="#actividad-calendario" 
							class="modal-sizes modal-with-zoom-anim" data-ida=""></a>
							<?php include( "secciones/data-actividad-cal.php" ); ?>
						</div>
					</section>
				</section>
			</div>
			
		</section>

		<?php include( "secciones/include-js.html" ); ?>

		<!-- Vendor -->
		<script src="../assets/vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>
		<script src="../assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="../assets/vendor/fuelux/js/spinner.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="../assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="../assets/vendor/fullcalendar/lib/moment.min.js"></script>
		<script src="../assets/vendor/fullcalendar/fullcalendar.js"></script>
		<script src="../assets/vendor/fullcalendar/lang/es.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../assets/javascripts/theme.js"></script>
		<script src="../assets/javascripts/ui-elements/examples.modals.js"></script>

		<!-- Theme Initialization Files -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
	
		<script src="js/fn-acceso.js"></script>
		<script src="js/init.modals.js"></script>
		<script src="js/fn-ui.js"></script>
		<script src="js/fn-calendario.js"></script>
		<script src="js/fn-actividad.js"></script>
		<script src="js/validate-extend.js"></script>
		<script type="text/javascript">
			/*$.fn.dataTable.moment( 'DD/MM/YY HH:mm A' );
    
		    var table = $('#datatable-prioridades').DataTable();
		    table.order( [ 1, 'asc' ] ).draw();*/

		    $(".fecha_repeticion").datepicker({
			    isRTL: false,
			    format: 'dd/mm/yyyy',
			    autoclose:true,
			    language: 'es'
			});
		</script>
		<script type="text/javascript">
			/*var idu = $("#id_ssu").val();
			$.ajax({
		        data:{ agendados: 1, id_u: idu },
	            url:"database/data-actividad.php",
	            type: 'POST', // Send post data
	            success: function(response) {
		            //get your events from response.events
		            console.log(response);
		        },
	            error: function() {
	                alert('There was an error while fetching events.');
	            }
		    });*/
		</script>
		
	</body>
</html>