// Funciones sobre calendario
/*
 * fn-calendario.js
 *
 */
/* --------------------------------------------------------- */	
/* --------------------------------------------------------- */
(function( $ ) {

	'use strict';
	/* --------------------------------------------------------- */
	var initCalendarDragNDrop = function() {
		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});
	};
	/* --------------------------------------------------------- */
	var initCalendar = function() {

		
		var $calendar = $('#calendar');
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		var idu = $("#id_ssu").val();

		$calendar.fullCalendar({
			header: {
				left: 'title',
				right: 'prev,today,next,basicDay,basicWeek,month'
			},

			timeFormat: 'h:mm t',

			titleFormat: {
				month: 'MMMM YYYY',      // September 2009
			    /*week: "d MMMM d MMMM",
			    day: 'dddd, MMMM d YYYY' // Tuesday, Sep 8, 2009*/
			},

			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
				var $externalEvent = $(this);
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $externalEvent.data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				copiedEventObject.className = $externalEvent.attr('data-event-class');

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#RemoveAfterDrop').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}

			},
			eventDrop: function( event ) {
				// Reasignación de fecha de actividad por arrastre
			    var f = event.start;
			    var nueva_fecha = moment(f, 'DD.MM.YYYY').format('YYYY-MM-DD H:mm');
			    var id_act = event.id;
			    
			    reasignarFechaActividad( id_act, nueva_fecha, "fecha" );
			},
			events: {
				data:{ agendados: 1, id_u: idu },
	            url:"database/data-actividad.php",
	            type: 'POST', // Send post data
	            success: function(response) {
		            
		        },
	            error: function() {
	                alert('Hubo un error al obtener las tareas');
	            }
	        },
	        eventClick: function( event, jsEvent, view ) {
	        	// Asignación de datos de actividad por clic en evento de calendario
	        	var f = event.start;
			    var hora = moment( f ).format('H:mm');
			    var fecha = moment(f, 'DD.MM.YYYY').format('YYYY-MM-DD');

			    $("#selector_act_cal").attr( "data-ida", event.id );
			    $("#ida_nvahora, #id_actfinalizar").val( event.id );
			    $("#nueva_hora").val( hora );
			    $("#fecha_act_cal").val( fecha );
			    $("#selector_act_cal").click();
			    resetPanelsDataActividadCalendario();
			}
		});

		// FIX INPUTS TO BOOTSTRAP VERSIONS
		var $calendarButtons = $calendar.find('.fc-header-right > span');
		$calendarButtons
			.filter('.fc-button-prev, .fc-button-today, .fc-button-next')
				.wrapAll('<div class="btn-group mt-sm mr-md mb-sm ml-sm"></div>')
				.parent()
				.after('<br class="hidden"/>');

		$calendarButtons
			.not('.fc-button-prev, .fc-button-today, .fc-button-next')
				.wrapAll('<div class="btn-group mb-sm mt-sm"></div>');

		$calendarButtons
			.attr({ 'class': 'btn btn-sm btn-default' });

		return $calendar;
	};
	/* --------------------------------------------------------- */
	$(function() {
		
		initCalendar();
		initCalendarDragNDrop();
		$("#trash").droppable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});

	});
	/* --------------------------------------------------------- */
	function reinicializarDatePicker(){
		// Reinicia la función datepicker para los campos de fecha dinámicamente creados

		$(".fecha_repeticion").datepicker({
		    isRTL: false,
		    format: 'dd/mm/yyyy',
		    autoclose:true,
		    language: 'es'
		});
	}
	/* --------------------------------------------------------- */
	function vectorFechasRepeticion(){
		// 
		var fechas = new Array();

		$(".fecha_repeticion").each( function(){
			fechas.push( $(this).val() );
    	});

    	return JSON.stringify( fechas );
	}
	/* --------------------------------------------------------- */
	function obtenerBloqueFechaRepeticion(){
		// Devuelve un bloque de selección de fecha a partir del primer bloque y asigna los valores correspondientes
		
		var qant_bloques_fechas = $( "#nfechas_rep" ).val();
		var $bloque = $( '#rf1' ).clone();
		qant_bloques_fechas++;

		$( $bloque ).attr( "id", "rf" + qant_bloques_fechas );
		$( $bloque ).addClass ( "nva_fecha_rep" );

		$( "#nfechas_rep" ).val( qant_bloques_fechas );

		var bloque = { "bloque": $bloque, "num": qant_bloques_fechas };

		return bloque;
	}
	/* --------------------------------------------------------- */
	function mostrarFechasRepeticion( freq, nrep, fecha_base ){
		// Muestra la proyección de fechas a repetirse una actividad de acuerdo a la frecuencia seleccionada
		var espera = "<img src='../img/loading.gif' width='25'>";

		$.ajax({
	        type:"POST",
	        url:"database/data-actividad.php",
	        data:{ freq_repeticion: freq, nrepeticiones: nrep, fecha: fecha_base },
	        beforeSend: function() {
	            $("#data_fechas_proyectadas").html( espera );
	        },
	        success: function( response ){
	        	$("#proyeccion_fechas").fadeIn();
	            $("#data_fechas_proyectadas").html( response );
	        }
	    });
	}
	/* --------------------------------------------------------- */
	function repetirActividad( ida, fecha_act, frecuencia, nrepeticiones, fechas_repeticion ){
	    // Invoca al servidor para registrar la repetición de una actividad
	    var espera = "<img src='../img/loading.gif' width='25'>";

	    $.ajax({
	        type:"POST",
	        url:"database/data-actividad.php",
	        data:{ repetir_act: ida, fecha: fecha_act, freq: frecuencia, 
	        		nrep: nrepeticiones, frm_fechas: fechas_repeticion },
	        beforeSend: function() {
	            $("#response_repetir_actividad").html( espera );
	        },
	        success: function( response ){
	        	console.log( response );
	        	res = jQuery.parseJSON( response );
	        	if( res.exito == 1 ){
	                notificar( "Activity", res.msg, "success" );
	                $("#response_repetir_actividad").html( res.mje );
	                //setTimeout( function() { location.reload( true ); }, 3000 );
	            }
	            else
	                notificar( "Activity", res.mje, "error" );
		            $("#response_repetir_actividad").html( res.mje );
		        }
	    });
	}
	/* --------------------------------------------------------- */
	$("#selector_act_cal").on( "click", function(){
        // Evento invocador para mostrar datos de actividad en calendario
        var ida = $(this).attr( "data-ida" );
        mostrarActividad( ida, "ventana_cal" );
    });

    $("#repetir_act").on( "click", function(){
        // Mostrar confirmación de finalización de actividad
        $("#opc_repetir_act").hide();
        $("#repetir_actividad").fadeIn();
    });

    $("#freq_rep_act").change(function() {
	  	// Evento seleccionador de frecuencia de repetición de una actividad
	  	var valor =  $(this).val();
	  	$(".opc_repeticiones").hide();
	  	if( valor == "Fechas" ){
			$("#fechas_repeticiones").fadeIn();
		}
	  	if( valor == "Semanal" ){
	  		$("#num_repeticiones_semanal").fadeIn();
	  	}
	  	if( valor == "Mensual" ){
	  		$("#num_repeticiones_mensual").fadeIn();
	  	}
	});

	/* ====================== */
	$(".nro_rep_frq").on( "click", function(){

		var nrep 		= $(this).html();
        var fecha_base 	= $("#fecha_act_cal").val();
        var freq 		= $("#freq_rep_act").val();
        $("#val_nrepeticiones").val( nrep );

		mostrarFechasRepeticion( freq, nrep, fecha_base );
	});
	/* ====================== */

	$(".agg_fecha_repeticion").on( "click", function(){
        // Replica un bloque de campo de fecha para repetición de actividad por fechas
        var campo_fecha = obtenerBloqueFechaRepeticion(); 
        
        $("#fechas_repeticion_actividad").append( campo_fecha.bloque );
        //var nbloque_actual = numBloquesFechasRepeticion();
        
        var del_but = campo_fecha.bloque.find(".del_fecha_repeticion");
  
        $( del_but ).attr( "data-num", "rf" + campo_fecha.num );
        $( del_but ).attr( "id", "df" + campo_fecha.num );
        reinicializarDatePicker();
    });

    $("#fechas_repeticion_actividad").on( "click", ".del_fecha_repeticion", function(){
    	// Elimina un elemento de fecha de repetición por fechas
    	var trg = $(this).attr( "data-num" );
    	$( "#" + trg ).fadeOut( "slow", function() {
		    $( "#" + trg ).remove();
		});
    });

    $("#confirmar_repetir_act").on( "click", function(){
        // Evento invocador para repetir una actividad

        var ida 		= $("#selector_act_cal").attr( "data-ida" );
        var fecha_act 	= $("#fecha_act_cal").val();
        var frecuencia 	= $("#freq_rep_act").val();
        var nrep 		= $("#val_nrepeticiones").val();
        var fechas_rep 	= "";
        
        if( frecuencia == "Fechas" )
        	var fechas_rep 	= vectorFechasRepeticion();
        
        repetirActividad( ida, fecha_act, frecuencia, nrep, fechas_rep );
    });

    /* ====================== */

    $("#desagendar_act").on( "click", function(){
        // Mostrar confirmación para desagendar actividad
        $(this).hide();
        $("#confirmacion_desagendar").fadeIn();
    });

    $("#cancelar_desagendar_act").on( "click", function(){
        // Cancelar acción para desagendar actividad
        $("#confirmacion_desagendar").hide();
        $("#desagendar_act").fadeIn();
    });

    $("#confirmar_desagendar_act").on( "click", function(){
        // Evento invocador para desagendar una actividad
        var ida = $("#selector_act_cal").attr( "data-ida" );
        desagendarActividad( ida );
    });
    /*======================*/
    $("#finalizar_act").on( "click", function(){
        // Mostrar confirmación de finalización de actividad
        $(this).hide();
        $("#confirmar_finalizacion").fadeIn();
    });

    $("#cancelar_finalizar_act").on( "click", function(){
        // Cancelar finalización de actividad
        $("#confirmar_finalizacion").hide();
        $("#finalizar_act").fadeIn();
    });

    $("#confirmar_finalizar_act").on( "click", function(){
        // Evento invocador para desagendar una actividad
        var ida = $("#selector_act_cal").attr( "data-ida" );
        //
    });

    $("#editar_hora").on( "click", function(){
        // Mostrar confirmación de finalización de actividad
        $("#frm_edithora").slideToggle();
    });
	/* --------------------------------------------------------- */
}).apply(this, [ jQuery ]);