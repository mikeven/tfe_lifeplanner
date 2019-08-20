<?php 
	/*
     * TFE Life Planner - Funciones sobre Actividades.
     * 
     */
    /* --------------------------------------------------------- */
    function etiqAct( $t ){
      // Devuelve la etiqueta del tipo de actvidad según parámetro t
      $tipo_actividad = array(
        'g' => "Gestión",
        'e' => "Escritorio",
        'l' => "Llamada"
      );

      return $tipo_actividad[$t];
    }
    /* --------------------------------------------------------- */
    function iconoActividad( $t ){
      // Devuelve el ícono del tipo de actvidad según parámetro t
      $icono_actividad = array(
        'g' => "<i class='fa fa-automobile'></i>",
        'e' => "<i class='fa fa-desktop'></i>",
        'l' => "<i class='fa fa-phone'></i>"
      );

      return $icono_actividad[$t];
    }
    /* --------------------------------------------------------- */
    function descActividad( $actividad ){
      // Devuelve el texto descriptivo de una actividad según tipo
      $icono_actividad = array(
        'g' => $actividad["tarea"],
        'e' => $actividad["tarea"],
        'l' => $actividad["contacto"]." ($actividad[motivo])"
      );

      return $icono_actividad[ $actividad["tipo"] ];
    }
    /* --------------------------------------------------------- */
    function infoPrioridad( $a ){
      // Devuelve los datos de una actividad en listado de prioridades
      $info = "";

      if( $a["tipo"] == "g" ){
        $info .= "<div>$a[lugar] / $a[direccion]</div>";
        $info .= "<div>$a[nsujeto] / $a[nobjeto]</div>";
        $info .= "<div>$a[tarea]</div>";
      }
      if( $a["tipo"] == "e" ){
        $info .= "<div>$a[nsujeto] / $a[nobjeto]</div>";
        $info .= "<div>$a[tarea]</div>";
      }
      if( $a["tipo"] == "l" ){
        $info .= "<div>$a[nsujeto] / $a[nobjeto]</div>";
        $info .= "<div>$a[contacto]</div>";
        $info .= "<div>$a[motivo]</div>";
      }

      echo $info;
    }
    /* --------------------------------------------------------- */
    function infoPrioridadForm( $a ){
      // Devuelve los datos de una actividad en listado de prioridades
      $info = "";
      $icono = iconoActividad( $a["tipo"] );

      if( $a["tipo"] == "g" ){
        $info .= "<div class='isuccess'>$icono</div>";
        $info .= "<div>$a[lugar] / $a[direccion]</div>";
        $info .= "<div>$a[nsujeto] / $a[nobjeto]</div>";
        $info .= "<div>$a[tarea]</div>";
      }
      if( $a["tipo"] == "e" ){
        $info .= "<div class='idanger'>$icono</div>";
        $info .= "<div>$a[nsujeto] / $a[nobjeto]</div>";
        $info .= "<div>$a[tarea]</div>";
      }
      if( $a["tipo"] == "l" ){
        $info .= "<div class='iwarning'>$icono</div>";
        $info .= "<div>$a[nsujeto] / $a[nobjeto]</div>";
        $info .= "<div>$a[contacto]</div>";
        $info .= "<div>$a[motivo]</div>";
      }

      echo $info;
    }
?>