<?php
    include('catalogos.php');
    
/**********************************************************************************
 * Creación de objetos para el uso de las clases. 
 * *********************************************************************************/

if(isset($_COOKIE["paginacion"]))
{
    $usuario = new Catalogos();
    switch($_COOKIE["paginacion"])
    {
        case 0:
            $usuario->primeraCarga();
            break;
        case 1:
            $usuario->paginar();
            break;
        case 2:
            $usuario->recuperarCue($_POST["pwd"], $_POST["pwd2"]);
            break;
    }
}
 
?>