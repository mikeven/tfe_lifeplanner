<?php
	/* --------------------------------------------------------- */
	/* - TFE Life Planner - Funciones sobre cuentas de usuario - */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	function obtenerListaUsuariosRegistrados( $dbh ){
		// Devuelve todos los registros de usuarios registrados
		$q = "select nombre, apellido, email, 
				date_format(creado,'%d/%m/%Y') as fregistro, 
				date_format(ultimo_ingreso,'%d/%m/%Y %h:%i %p') as fultimo_ingreso from usuario";

		return obtenerListaRegistros( mysqli_query( $dbh, $q ) );
	}
?>