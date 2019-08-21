<?php
	/* --------------------------------------------------------- */
	/* -- TFE Life Planner - Funciones sobre datos de usuario -- */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	/* --------------------------------------------------------- */
	function obtenerDatosUsuario( $dbh, $id ){
		// Devuelve el registro de un usuario dado su id
		$q = "select id, nombre, email, date_format(creado,'%d/%m/%Y') as fregistro, 
		date_format(ultimo_ingreso,'%d/%m/%Y') as ult_ingreso from usuario where id = $id";

		$rst = mysqli_query( $dbh, $q );
		$data = mysqli_fetch_array( $rst );

		return $data;
	}
	/* --------------------------------------------------------- */
	function actualizarContrasena( $dbh, $usuario ){
		// Actualiza el campo de contraseña de un registro de usuario
		$q = "update usuario set password = '$usuario[pwd1]' where id = $usuario[idu]";

		$data = mysqli_query( $dbh, $q );
		return mysqli_affected_rows( $dbh );
	}
	/* --------------------------------------------------------- */
	function actualizarDatosPersonales( $dbh, $usuario ){
		// Actualiza los cámpos de datos personales de un registro de usuario
		$q = "update usuario set nombre = '$usuario[nombre]', 
		email = '$usuario[email]' where id = $usuario[idu]";

		$data = mysqli_query( $dbh, $q );
		return mysqli_affected_rows( $dbh );
	}
	/* --------------------------------------------------------- */
	//Inicio de sesión (asinc)
	if( isset( $_POST["usr_login"] ) ){ 
		// Invocación desde: js/fn-usuario.js
		session_start();
		include( "bd.php" );
		$email 	= escaparTexto( $dbh, $_POST["email"] );
		$pwd 	= escaparTexto( $dbh, $_POST["password"] );
		$login 	= checkLogin( $dbh, $email, $pwd );
		
		if( $login["valido"] ){
			actualizarUltimoIngreso( $dbh, $login["usuario"]["id"] );
			$res["exito"] = 1;
			$res["mje"] = "Successful login";
		} else {
			$res["exito"] = 0;
			$res["mje"] = "Invalid email or password, check your info and try again";
		}
		
		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	// Actualizar datos personales (asinc)
	if( isset( $_POST["act_datap"] ) ){ 
		// Invocación desde: js/fn-usuario.js
		include( "bd.php" );
		include( "data-sistema.php" );
		parse_str( $_POST["act_datap"], $usuario );

		$usuario = escaparCampos( $dbh, $usuario );
		
		if( nombreDisponible($dbh, "usuario", "email", $usuario["nombre"], $usuario["idu"], "" )){
			$rsp = actualizarDatosPersonales( $dbh, $usuario );
			if( $rsp != -1 ){
				$res["exito"] = 1;
				$res["mje"] = "User data updated successfully";
				$res["mje2"] = "Remember updated email for next login";
			} else {
				$res["exito"] = 0;
				$res["mje"] = "There was a problem updating data user";
			}
		}else{
			$res["exito"] = 0;
			$res["mje"] = "This email already exists";
		}
		
		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	// Actualizar contraseña (asinc)
	if( isset( $_POST["act_pwd"] ) ){ 
		// Invocación desde: js/fn-usuario.js
		include( "bd.php" );
		parse_str( $_POST["act_pwd"], $usuario );

		$usuario = escaparCampos( $dbh, $usuario );
		$rsp = actualizarContrasena( $dbh, $usuario );

		if( $rsp != -1 ){
			$res["exito"] = 1;
			$res["mje"] = "Password updated successfully";
			$res["mje2"] = "Remember to use this password next time you login";
		} else {
			$res["exito"] = 0;
			$res["mje"] = "There was a problem changing password";
		}
		
		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	//Registro de usuarios (asinc)
	if( isset( $_POST["usr_reg"] ) ){ 
		// Invocación desde: js/fn-usuario.js
		include( "bd.php" );
		parse_str( $_POST["usr_reg"], $usuario );
		$usuario = escaparCampos( $dbh, $usuario );

		$rsp = registrarUsuario( $dbh, $usuario );

		if( ( $rsp != 0 ) && ( $rsp != "" ) ){
			$res["exito"] = 1;
			$res["mje"] = "Your user has been created, you can now login";
		} else {
			$res["exito"] = 0;
			$res["mje"] = "There was a problem creating user";
		}
		echo json_encode( $res );
	}
	/* --------------------------------------------------------- */
	//Cierre de sesión
	if( isset( $_POST["logout"] ) ){
		session_start();
		
		unset( $_SESSION["login"] );
		unset( $_SESSION["user"] );
		echo 1;		
	}
	/* --------------------------------------------------------- */
?>