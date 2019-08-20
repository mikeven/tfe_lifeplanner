<?php 
	/*
     * TFE Life Planner - Funciones sobre S.O.P.A.
     * 
     */
	$ida = NULL;
    $idu = $_SESSION["user"]["id"];
    $areas = obtenerListaAreas( $dbh, $idu );

    if( isset( $_GET["id_area"] ) ){
    	$init_area = true;
        $ida = $_GET["id_area"];
        $area = obtenerAreaPorId( $dbh, $ida );
        $sujetos_a = obtenerSujetosPorArea( $dbh, $ida );
    }

    if( isset( $_GET["s"] ) ){
    	$idsesion = $_GET["s"];
    	$s_o = obtenerSujetoObjetoPorSesion( $dbh, $idsesion );
        if( $s_o ){
        	$ida = $s_o[0]["idarea"];
        	$ids = $s_o[0]["idsujeto"];
        	$area = obtenerAreaPorId( $dbh, $ida );
            $sujetos_a = obtenerSujetosPorArea( $dbh, $ida );
            $objetos_s = obtenerObjetosPorSujeto( $dbh, $ids );
        }
    }

    if( isset( $_GET["ids"], $_GET["ido"] ) ){
        $carga_so = true;
        $ids = $_GET["ids"];    $ido = $_GET["ido"];
        $s_o = obtenerListaSujetoObjetoPorIds( $dbh, $ids, $ido );
        //array( obtenerSujetoObjetoPorids( $dbh, $ids, $ido ) );
    }
?>