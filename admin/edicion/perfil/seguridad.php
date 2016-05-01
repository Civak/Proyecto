<?php
/*
Se incluye el archivo PHP con las funciones necesarias para consultar la BD y obtener la
información del usuario que desea cambiar su pregunta y respuesta de seguridad.
*/
    include('php/clasesFunciones.php');
    $seguridad = new Perfil();
    $seguridad->seguridadMostrar();
?>