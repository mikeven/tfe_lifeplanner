<?php
	/* --------------------------------------------------------- */
	/* TFE Life Planner - Datos de índices S.O.P.A. */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	
	/* --------------------------------------------------------- */
	function obtenerIndiceSOPAPorUsuario( $dbh, $idu ){
		// Devuelve los registros de todas las actividades en estado creado

		$q = "select DISTINCT s.id, o.id, s.id as idsujeto, s.nombre nsujeto, 
		o.id as idobjeto, o.nombre as nobjeto 
		from sujeto_objeto so, sujeto s, objeto o, usuario u, sesion ss 
		where s.id = so.sujeto_id and o.id = so.objeto_id and so.sesion_id = ss.id 
		and ss.usuario_id = u.id and u.id = $idu order by nsujeto ASC, nobjeto ASC";

		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
	/* --------------------------------------------------------- */
	function obtenerActividadSOPAPorId( $dbh, $id_act ){
		// Procesa el registro de nueva área
		$q = "select ss.id as idsesion, act.id as idact, act.tipo as tipo_act, 
		act.tarea as tarea, act.lugar as lugar, act.direccion as direccion, 
		act.motivo as motivo, act.contacto as contacto, 
		date_format(act.creado,'%d/%m/%Y') as freg_actividad, 
		so.id as id_so, date_format(so.creado,'%d/%m/%Y') as freg_so, p.id as idprop, 
		p.descripcion as proposito, s.id as idsujeto, s.nombre nsujeto, 
		o.id as idobjeto, o.nombre as nobjeto, a.id as idarea, a.nombre as narea 
		from actividad act, proposito p, sujeto_objeto so, sesion ss, 
		sujeto s, objeto o, area a
		where act.proposito_id = p.id and p.sujeto_objeto_id = so.id and 
		s.id = so.sujeto_id and o.id = so.objeto_id and a.id = so.area_id 
		and so.sesion_id = ss.id and act.id = $id_act";

		$rst = mysqli_query( $dbh, $q );
		$data = mysqli_fetch_array( $rst );

		return $data;
	}
	/* --------------------------------------------------------- */
	function chequearActividadesPendientes( $actividades ){
		// Devuelve verdadero si hay actividades en estado: creadas, prioridad
		$pendiente = false;
		foreach ( $actividades as $a ) {
			if( $a["estado"] == "creada" || $a["estado"] == "prioridad" ){
				$pendiente = true;
				break;
			}
		}
		return $pendiente;
	}
	/* --------------------------------------------------------- */
	function actPendientes( $dbh, $i ){
		// Devuelve verdadero si el registro sujeto-objeto posee propósitos con actividades
		// en estado: creadas, prioridad
		$pendiente = false;
		$propositos = obtenerPropositosSujetoObjeto( $dbh, $i["idsujeto"], $i["idobjeto"] );
		
		foreach ( $propositos as $p ) {
			$actividades = obtenerListaActividades( $dbh, $p["id"] );
			if( chequearActividadesPendientes( $actividades ) == true ){
				$pendiente = true;
				break;
			}
		}
		return $pendiente;
	}
	/* --------------------------------------------------------- */
?>