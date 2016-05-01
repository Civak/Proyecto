<?php
    include('conexion.php');
    /*****************************************
    * Creación de objetos para registrar visitas y clicks en secciones.
    ******************************************/
    $usuario = new Conexiones();
    $usuario->registrarVisita();

?>