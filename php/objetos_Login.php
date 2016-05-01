<?php
    include('conexion.php');
    
/**********************************************************************************
 * Creación de objetos para el uso de las clases. 
 * *********************************************************************************/

if(isset($_COOKIE["accion"]))
{
    $usuario = new Conexiones();
    switch($_COOKIE["accion"])
    {
        case 0:
            $usuario->crearSesion($_POST["usuario"], $_POST["password"]);
            break;
        case 1:
            $usuario->verificarUsPr($_POST["nickname"], $_POST["pregunta"]);
            break;
        case 2:
            $usuario->recuperarCue($_POST["pwd"], $_POST["pwd2"]);
            break;
    }
}
 
?>