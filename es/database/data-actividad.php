<?php
	/* --------------------------------------------------------- */
	/* TFE Life Planner - Acceso a actividades */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	function obtenerTodasActividades( $dbh, $idu ){
		// Devuelve todos los registros de actividades de un propósito
		$q = "select * from actividad where proposito_id = $idp";

		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function obtenerListaActividades( $dbh, $idp ){
		// Devuelve todos los registros de actividades de un propósito
		$q = "select * from actividad where proposito_id = $idp";

		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function obtenerActividadPorId( $dbh, $id ){
		// Devuelve el registro de un área dado su id
		$q = "select act.id, act.tipo, act.estado, act.tarea, act.lugar, act.direccion, 
		act.motivo, act.contacto, date_format(act.creado,'%d/%m/%Y') as fregistro, 
		s.nombre as nsujeto, o.nombre as nobjeto,  
		date_format(act.fecha_prioridad,'%d/%m/%Y') as fprioridad, 
		date_format(act.fecha_agenda,'%d/%m/%Y') as fagendada, act.resultado,  
		date_format(act.fecha_calendario,'%d/%m/%Y %h:%i %p') as fcalendario,
		date_format(act.fecha_calendario, '%H:%i') as hcalendario, 
		date_format(act.fecha_terminacion,'%d/%m/%Y') as fterminacion, 
		date_format(act.fecha_cancela,'%d/%m/%Y') as fcancelacion, 
		p.id as idprop, p.descripcion as proposito from actividad act, proposito p, 
		sujeto s, objeto o, sujeto_objeto so where act.proposito_id = p.id and act.id = $id 
		and p.sujeto_objeto_id = so.id and so.sujeto_id = s.id and so.objeto_id = o.id";
		
		$rst = mysqli_query( $dbh, $q );
		$data = mysqli_fetch_array( $rst );

		return $data;
	}
	/* --------------------------------------------------------- */
	function obtenerPrioridadesTipo( $dbh, $idu, $tipo ){
		// Devuelve las actividades marcadas con prioridad por tipo

		$q = "select act.id as id_act, act.tipo, act.estado, act.tarea, act.lugar, 
		act.direccion, act.motivo, act.contacto,   
		date_format(act.fecha_prioridad,'%d/%m/%Y %h:%i %p') as tprioridad, 
		s.id as idsujeto, s.nombre as nsujeto, o.id as idobjeto, o.nombre as nobjeto 
		from actividad act, proposito p, sujeto s, objeto o, sujeto_objeto so, sesion ss 
		where act.proposito_id = p.id and act.estado = 'prioridad' and p.sujeto_objeto_id = so.id 
		and so.sujeto_id = s.id and so.objeto_id = o.id and so.sesion_id = ss.id 
		and ss.usuario_id = $idu and act.tipo = '$tipo' order by act.fecha_prioridad ASC";

		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function obtenerActividadesAgendadas( $dbh, $idu ){
		// Devuelve las actividades agendadas en calendario

		$q = "select act.id as id_act, act.tipo, act.estado, act.tarea, act.lugar, 
		act.direccion, act.motivo, act.contacto,   
		date_format(act.fecha_agenda,'%d/%m/%Y %h:%i %p') as fecha_agendada,
		date_format(act.fecha_calendario,'%Y-%m-%d %H:%i') as fecha_calendario, 
		s.id as idsujeto, s.nombre nsujeto, o.id as idobjeto, o.nombre as nobjeto 
		from actividad act, proposito p, sujeto s, objeto o, sujeto_objeto so, sesion ss 
		where act.proposito_id = p.id and act.estado = 'agendada' and p.sujeto_objeto_id = so.id 
		and so.sujeto_id = s.id and so.objeto_id = o.id and so.sesion_id = ss.id 
		and ss.usuario_id = $idu order by act.fecha_prioridad ASC";
		
		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function obtenerActividadesSujetoObjeto( $dbh, $ids, $ido ){
		// Devuelve las actividades asociadas a un elemento sujeto-objeto indiferente del propósito al que pertenezca

		$q = "select act.id as id_act, act.tipo, act.estado, act.tarea, act.lugar, 
		act.direccion, act.motivo, act.contacto,   
		date_format(act.fecha_agenda,'%d/%m/%Y %h:%i %p') as fecha_agendada,
		date_format(act.fecha_calendario,'%Y-%m-%d %H:%i') as fecha_calendario, 
		s.id as idsujeto, s.nombre nsujeto, o.id as idobjeto, o.nombre as nobjeto 
		from actividad act, proposito p, sujeto s, objeto o, sujeto_objeto so, sesion ss 
		where act.proposito_id = p.id and p.sujeto_objeto_id = so.id 
		and so.sujeto_id = s.id and so.objeto_id = o.id and so.sesion_id = ss.id 
		and s.id = $ids and o.id = $ido order by act.fecha_prioridad DESC";
		
		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function obtenerHistorial( $dbh, $idu ){
		// Devuelve las actividades finalizadas

		$q = "select act.id as id_act, act.tipo, act.estado, act.tarea, act.lugar, 
		act.direccion, act.motivo, act.contacto, act.resultado, 
		date_format(act.fecha_calendario,'%d/%m/%Y %h:%i %p') as fcalendario,
		date_format(act.fecha_terminacion,'%d/%m/%Y %h:%i %p') as fterminacion, 
		s.id as idsujeto, s.nombre nsujeto, o.id as idobjeto, o.nombre as nobjeto 
		from actividad act, proposito p, sujeto s, objeto o, sujeto_objeto so, sesion ss 
		where act.proposito_id = p.id and act.estado = 'finalizada' and 
		p.sujeto_objeto_id = so.id and so.sujeto_id = s.id and so.objeto_id = o.id 
		and so.sesion_id = ss.id and ss.usuario_id = $idu order by act.fecha_terminacion DESC";

		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function obtenerHistorialSujetoObjeto( $dbh, $ids, $ido ){
		// Devuelve las actividades finalizadas de un par sujeto-objeto

		$q = "select act.id as id_act, act.tipo, act.estado, act.tarea, act.lugar, 
		act.direccion, act.motivo, act.contacto, act.resultado, 
		date_format(act.fecha_calendario,'%d/%m/%Y %h:%i %p') as fcalendario,
		date_format(act.fecha_terminacion,'%d/%m/%Y %h:%i %p') as fterminacion, 
		s.id as idsujeto, s.nombre nsujeto, o.id as idobjeto, o.nombre as nobjeto 
		from actividad act, proposito p, sujeto s, objeto o, sujeto_objeto so 
		where act.proposito_id = p.id and act.estado = 'finalizada' and 
		p.sujeto_objeto_id = so.id and so.sujeto_id = s.id and so.objeto_id = o.id 
		and s.id = $ids and o.id = $ido order by act.fecha_calendario DESC";

		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function obtenerSOHistorial( $dbh, $idu ){
		// Devuelve los registros sujetos-objetos que poseen actividades finalizadas

		$q = "select DISTINCT s.id, o.id, s.id as idsujeto, s.nombre as nsujeto, 
		o.id as idobjeto, o.nombre as nobjeto 
		from sujeto_objeto so, sujeto s, objeto o, usuario u, actividad a, proposito p, sesion ss 
		where s.id = so.sujeto_id and o.id = so.objeto_id and p.sujeto_objeto_id = so.id 
		and a.proposito_id = p.id and a.estado = 'finalizada' and so.sesion_id = ss.id 
		and ss.usuario_id = u.id and u.id = $idu ORDER BY s.nombre ASC";

		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function agregarActividad( $dbh, $a, $estado ){
		// Procesa el registro de nueva actividad
		
		$q = "insert into actividad ( tipo, estado, tarea, lugar, direccion, motivo, contacto, 
		creado, proposito_id ) values ('$a[tipo]', '$estado', '$a[tarea]', '$a[lugar]', 
		'$a[direccion]', '$a[motivo]', '$a[contacto]', NOW(), $a[id_prop_act] )";
		
		$data = mysqli_query( $dbh, $q );
		return mysqli_insert_id( $dbh );
	}
	/* --------------------------------------------------------- */
	function editarActividad( $dbh, $a ){
		// Edita un registro de actividad
		$q = "update actividad set tipo = '$a[tipo]', tarea = '$a[eatarea]', 
		lugar = '$a[ealugar]', direccion = '$a[eadireccion]', motivo = '$a[eamotivo]', 
		contacto = '$a[eacontacto]', modificado = NOW() where id = $a[id_eact]";
		
		return mysqli_query( $dbh, $q );
	}
	/* --------------------------------------------------------- */
	function asignarPrioridad( $dbh, $actividad ){
		// Edita un registro de actividad para actualizar su valor de prioridad
		$q = "update actividad set estado = '$actividad[estado]', 
		fecha_prioridad = $actividad[fecha_p] where id = $actividad[id]";
		
		return mysqli_query( $dbh, $q );
	}
	/* --------------------------------------------------------- */
	function agendarPrioridad( $dbh, $actividad ){
		// Edita un registro de actividad para asignar fecha en calendario
		$q = "update actividad set estado = '$actividad[estado]', 
		fecha_agenda = '$actividad[fecha_agenda]', fecha_calendario = '$actividad[fecha_cal]' 
		where id = $actividad[id_actividad]";
		//echo $q;
		return mysqli_query( $dbh, $q );
	}
	/* --------------------------------------------------------- */
	function finalizarActividad( $dbh, $actividad ){
		// Edita un registro de actividad para migrarlo a historial
		$q = "update actividad set estado = '$actividad[estado]', 
		fecha_terminacion = NOW(), resultado = '$actividad[resultado]' 
		where id = $actividad[id_actfin]";
		//echo $q;
		return mysqli_query( $dbh, $q );
	}
	/* --------------------------------------------------------- */
	function actualizarResultadoActividad( $dbh, $actividad ){
		// Edita el resultado de una actividad
		$q = "update actividad set resultado = '$actividad[resultado]' 
		where id = $actividad[id_actfin]";
		//echo $q;
		return mysqli_query( $dbh, $q );
	}
	/* --------------------------------------------------------- */
	function actualizarFechaActividad( $dbh, $ida, $fecha ){
		// Edita un registro de actividad para actualizar fecha de calendario
		$q = "update actividad set fecha_agenda = NOW(), fecha_calendario = '$fecha' 
		where id = $ida";
		
		return mysqli_query( $dbh, $q );
	}
	/* --------------------------------------------------------- */
	function eliminarActividad( $dbh, $id ){
		// Elimina un registro de actividad
		$q = "delete from actividad where id = $id";
		return mysqli_query( $dbh, $q );
	}
	/* --------------------------------------------------------- */
	function obtenerPrioridades( $dbh, $idu ){
		// Devuelve las actividades marcadas con prioridad

		$prioridades['g'] = obtenerPrioridadesTipo( $dbh, $idu, 'g' );
		$prioridades['e'] = obtenerPrioridadesTipo( $dbh, $idu, 'e' );
		$prioridades['l'] = obtenerPrioridadesTipo( $dbh, $idu, 'l' );

		return $prioridades;
	}
	/* --------------------------------------------------------- */
	function limpiarCamposTipoActividad( $actividad ){
		// Elimina el contenido de los campos de actividad según tipo
		if( $actividad["tipo"] == "g" ){
			$actividad["eamotivo"] = $actividad["eacontacto"] = "";
		}
		if( $actividad["tipo"] == "e" ){
			$actividad["eamotivo"] = $actividad["eacontacto"] = "";
			$actividad["ealugar"] = $actividad["eadireccion"] = "";
		}
		if( $actividad["tipo"] == "l" ){
			$actividad["ealugar"] = $actividad["eatarea"] = $actividad["eadireccion"] = "";
		}

		return $actividad;
	}
	/* --------------------------------------------------------- */
	function obtenerDataPrioridad( $ida, $accion ){
		// Devuelve los datos para la asignación de prioridad en una actividad
		
		$actividad["id"] = $ida; 
		if( $accion == "dar_p" ){
			$actividad["estado"] = "prioridad";
			$actividad["fecha_p"] = "NOW()";
		}
		if( $accion == "quitar_p" ){
			$actividad["estado"] = "creada";
			$actividad["fecha_p"] = "NULL";
		}
		return $actividad;
	}
	/* --------------------------------------------------------- */
	function obtenerDataAgenda( $ida, $actividad, $accion ){
		// Devuelve los datos para la asignación de prioridad en una actividad
		
		if( $accion == "agendar" ){
			$actividad["estado"] = "agendada";
			$actividad["fecha_agenda"] = "NOW()";
		}
		if( $accion == "desagendar" ){
			$actividad["estado"] = "prioridad";
			$actividad["fecha_agenda"] = "NULL";
			$actividad["fecha_cal"] = "NULL";
		}
		return $actividad;
	}
	/* --------------------------------------------------------- */
	function titActividad( $actividad ){
      // Devuelve el texto descriptivo de una actividad para mostrar en calendario
      $titulo = "";
      if( $actividad["tipo"] == "g" )
      	$titulo = $actividad["lugar"]."/".$actividad["direccion"];
      if( $actividad["tipo"] == "e" )
      	$titulo = $actividad["nsujeto"]."/".$actividad["tarea"];
      if( $actividad["tipo"] == "l" )
      	$titulo = $actividad["contacto"]."/".$actividad["motivo"];
      
      return $titulo;

    }
	/* --------------------------------------------------------- */
    function colorActividad( $actividad ){
      // Devuelve el texto descriptivo de una actividad según tipo
      $color = array(
        'g' => '#47a447',
        'e' => '#d2322d',
        'l' => '#ed9c28'
      );

      return $color[ $actividad["tipo"] ];
    }
    /* --------------------------------------------------------- */
    function replicarActividadParaRepeticion( $actividad_base ){
    	// Devuelve un arreglo con los datos de una actividad para crear una nueva
    	
		$actividad = array(
			"tipo" 			=> $actividad_base["tipo"],
			"tarea" 		=> $actividad_base["tarea"],
			"lugar"			=> $actividad_base["lugar"],
			"direccion"		=> $actividad_base["direccion"],
			"motivo"		=> $actividad_base["motivo"],
			"contacto"		=> $actividad_base["contacto"],
			"id_prop_act"	=> $actividad_base["idprop"]
		);

		return $actividad;
    }
	/* --------------------------------------------------------- */
    function repetirActividadFrecuencia( $dbh, $id_actividad, $fechas ){
    	// Procesa la actividad base para registrar sus repeticiones según las fechas obtenidas

    	$actividad_base 	= obtenerActividadPorId( $dbh, $id_actividad );
    	$hora 				= $actividad_base["hcalendario"];
    	$nueva_actividad 	= replicarActividadParaRepeticion( $actividad_base );
    	$exito				= 1;

    	foreach ( $fechas as $f ) {
    		$ida = agregarActividad( $dbh, $nueva_actividad, 'agendada' );
    		if( $ida == 0 ) $exito = -1;
    		$fecha = $f." ".$hora;
    		actualizarFechaActividad( $dbh, $ida, $fecha );
    	}

    	return $exito;
    }
	/* --------------------------------------------------------- */
    function mostrarFechasProyectadas( $fechas ){
    	//
    	$bloque_fechas = "";
    	foreach ( $fechas as $f ) {
    		$bloque_fechas .= "<div class='txfechas_proy'>".$f."</div>";
    	}
    	echo $bloque_fechas;
    }
	/* --------------------------------------------------------- */
    function calcularFechasFuturas( $fecha, $frequencia, $n, $param ){
    	// Devuelve un arreglo con el número de fechas futuras a partir de una fecha base, frecuencia y número de frecuencia
    	
    	$dias_freq = array( 'Semanal' => 7, 'Mensual' => 30 );
    	$ndias = $dias_freq[ $frequencia ];
    	$fechas = array();
    	$dias = array( "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado" );
    	
    	for ( $i = 0; $i < $n;  $i++ ){
    		$fecha = date('d-m-Y', strtotime( $fecha. ' + '. $ndias .' days') );

    		if( $param == "impresion" ){
    			$dsemana = $dias[ date( 'w', strtotime( $fecha ) ) ];
    			$fechas[] = $dsemana . " " . $fecha;
    		}else{
    			$fechas[] = date( 'Y-m-d', strtotime( $fecha ) );
    		}
    	} 
    	
    	return $fechas;
    }
	/* --------------------------------------------------------- */
    function formatearFechas( $fechas ){
		// Devuelve una lista de fechas en formato YYYY-mm-dd

		$fechas_formato = array();

		foreach ( $fechas as $f )
			$fechas_formato[] = cambiaf_a_mysql( $f );

		return $fechas_formato;
    }
	/* --------------------------------------------------------- */
	if( isset( $_POST["nactividad"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );

		parse_str( $_POST["nactividad"], $actividad );
		$actividad = escaparCampos( $dbh, $actividad );
		
		$rsp = agregarActividad( $dbh, $actividad, 'creada' );
		if( $rsp != 0 ){
			$res["exito"] = 1;
			$res["mje"] = "Actividad registrada con éxito";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al registrar actividad";
		}

		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["edit_act"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );

		parse_str( $_POST["edit_act"], $actividad );
		$actividad = escaparCampos( $dbh, $actividad );
		$actividad = limpiarCamposTipoActividad( $actividad );

		$rsp = editarActividad( $dbh, $actividad );
		
		if( $rsp == 1 ){
			$res["exito"] = 1;
			$res["mje"] = "Actividad editada con éxito";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al editar actividad";
		}

		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["mostrar_act"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );

		$ida = $_POST["mostrar_act"];
		$actividad = obtenerActividadPorId( $dbh, $ida );
		
		if( $actividad != NULL ){
			$res["exito"] = 1;
			$res["reg"] = $actividad;
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al obtener actividad";
		}
		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */	
	if( isset( $_POST["elim_act"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );
		
		$rsp = eliminarActividad( $dbh, $_POST["elim_act"] );
		if( $rsp != 0 ){
			$res["exito"] = 1;
			$res["mje"] = "Actividad eliminada con éxito";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al eliminar actividad";
		}

		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["prioridad"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );

		$ida = $_POST["prioridad"];
		$accion = $_POST["valor_a"];
		$actividad = obtenerDataPrioridad( $ida, $accion );
		
		$rsp = asignarPrioridad( $dbh, $actividad );
		if( $rsp == 1 ){
			$res["exito"] = 1;
			$res["mje"] = "Actividad actualizada";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al actualizar actividad";
		}

		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["agendar_act"] ) ){ 
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );

		parse_str( $_POST["agendar_act"], $actividad );
		$actividad = obtenerDataAgenda( $actividad["id_actividad"], $actividad, "agendar" );
		$actividad["fecha_cal"] = cambiaf_a_mysql( $actividad["fecha_cal"] );
		$actividad["fecha_cal"] .= " ".$actividad["hora_cal"]; 
		
		$rsp = agendarPrioridad( $dbh, $actividad );
		if( $rsp == 1 ){
			$res["exito"] = 1;
			$res["mje"] = "Actividad migrada a calendario con éxito";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al agendar actividad";
		}

		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	// Obtiene las actividades agendadas en calendario
	if( isset( $_POST["agendados"] ) ){
		// Invocación desde: js/fn-calendario.js
		include( "bd.php" );

		$idu = $_POST["id_u"];
		$e = array();
		
		$actividades = obtenerActividadesAgendadas( $dbh, $idu );
		$eventos = array();
		
		foreach ( $actividades as $a ) {
			
			$e['id'] = $a["id_act"];
	    	$e['title'] = titActividad( $a );
	    	$e['start'] = $a["fecha_calendario"];
	    	$e['allDay'] = false;
	    	$e['color'] = colorActividad( $a );

	    	array_push( $eventos, $e );
		}
		
	    echo json_encode( $eventos );
	}
	/* --------------------------------------------------------- */
	// Actualiza la fecha de una actividad
	if( isset( $_POST["nueva_fecha"] ) ){
		// Invocación desde: js/fn-calendario.js
		include( "bd.php" );

		$ida = $_POST["id_act"];
		$fecha = $_POST["nueva_fecha"];
		
		$rsp = actualizarFechaActividad( $dbh, $ida, $fecha );
		if( $rsp == 1 ){
			$res["exito"] = 1;
			$res["mje"] = "Fecha de actividad actualizada";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al actualizar fecha de actividad";
		}

		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	// Actualiza la fecha de una actividad
	if( isset( $_POST["desagendar"] ) ){
		// Invocación desde: js/fn-calendario.js
		include( "bd.php" );

		$ida = $_POST["desagendar"];
		$actividad = array();
		$actividad = obtenerDataAgenda( $ida, $actividad, "desagendar" );
		$actividad["id_actividad"] = $ida;

		$rsp = agendarPrioridad( $dbh, $actividad );
		if( $rsp == 1 ){
			$res["exito"] = 1;
			$res["mje"] = "La actividad fue quitada del calendario";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al quitar actividad";
		}
		
		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	// Actualiza la fecha de una actividad
	if( isset( $_POST["finalizar_act"] ) ){
		// Invocación desde: js/fn-calendario.js
		include( "bd.php" );

		parse_str( $_POST["finalizar_act"], $actividad );
		$actividad = escaparCampos( $dbh, $actividad );
		$actividad["estado"] = "finalizada";

		$rsp = finalizarActividad( $dbh, $actividad );
		if( $rsp == 1 ){
			$res["exito"] = 1;
			$res["mje"] = "La actividad fue migrada al historial";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al migrar actividad";
		}
		
		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	// Actualiza el resultado de una actividad
	if( isset( $_POST["edit_rslt"] ) ){
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );

		parse_str( $_POST["edit_rslt"], $actividad );
		$actividad = escaparCampos( $dbh, $actividad );
		
		$rsp = actualizarResultadoActividad( $dbh, $actividad );
		if( $rsp == 1 ){
			$res["exito"] = 1;
			$res["mje"] = "La actividad fue actualizada con éxito";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al actualizar actividad";
		}
		
		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["freq_repeticion"] ) ){
		// Invocación desde: js/fn-actividad.js
		include( "bd.php" );

		$frecuencia = $_POST["freq_repeticion"];
		$n 			= $_POST["nrepeticiones"];
		$fecha 		= $_POST["fecha"];

		$fechas = calcularFechasFuturas( $fecha, $frecuencia, $n, "impresion" );
		mostrarFechasProyectadas( $fechas );
	}
	/* --------------------------------------------------------- */
	if( isset( $_POST["repetir_act"] ) ){
		// Invocación desde: js/fn-calendario.js
		include( "bd.php" );

		$id_actividad 	= $_POST["repetir_act"];
		$frecuencia 	= $_POST["freq"];
		$n_reps 		= $_POST["nrep"];
		$fecha 			= $_POST["fecha"];

		if( $frecuencia != "Fechas" ){
			$fechas = calcularFechasFuturas( $fecha, $frecuencia, $n_reps, "data" );
		}
		else{
			$fechas = formatearFechas( json_decode( $_POST["frm_fechas"] ) );
		}
		
		$rsp = repetirActividadFrecuencia( $dbh, $id_actividad, $fechas );

		if( $rsp == 1 ){
			$res["exito"] = 1;
			$res["mje"] = "La actividad fue replicada con éxito <a href='#!' onClick='window.location.reload()'>Recargar</a>";
			$res["msg"] = "La actividad fue replicada con éxito";
		}else{
			$res["exito"] = -1;
			$res["mje"] = "Error al replicar actividad";
		}
		
		echo json_encode( $res );
		
	}
	/* --------------------------------------------------------- */
?>