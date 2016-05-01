<?php
    include('php/clasesFunciones.php');
	/*
	Se manda llamar clase Tienda con su función mostrar (ver detalles en el archivo que se incluye), se generan 
	inputs con los datos actuales de la Tienda. Este archivo se carga mediante AJAX.
	*/
    $tienda = new Tienda();
    $tienda->mostrar();
?>

