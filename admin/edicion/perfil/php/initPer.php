<?php 
include('clasesFunciones.php');
/*Verifico si la cookie acción está colocada o está activa, esta cookie se coloca mediante el 
plugin de cookies de JQuery con su respectivo valor que será evaluado en el Switch. (Ver archivo en carpeta
js/scriptsGrales.js
*/
    if(isset($_COOKIE['accion']))
    {
		//Se crea objeto de la clase Perfil
        $usuario = new Perfil();
        switch($_COOKIE['accion'])
        {
            case 0:
                $usuario->contrasenia();
                break;
            case 1:
                $usuario->nick();
                break;
            case 2:
                $usuario->seguridad();
                break;
        }
    }
    else echo "Posiblemente no están las cookies habilitades en el navegador; por favor habilita el uso de cookies."
    
?>