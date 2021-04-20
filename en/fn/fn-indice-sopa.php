<?php 
	/*
     * TFE Life Planner - Funciones sobre índice S.O.P.A.
     * 
     */
	$ida = NULL;
    $idu = $_SESSION["user"]["id"];
    $areas = obtenerListaAreasSO( $dbh, $idu );

    if( isset( $_GET["area_id"] ) ){
        $ida    = $_GET["area_id"];
        $indice = obtenerIndiceSOPorUsuarioArea( $dbh, $idu, $ida );
    }else
        $indice = obtenerIndiceSOPAPorUsuario( $dbh, $idu );
?>