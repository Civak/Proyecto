<?php 
/*
Se incluye el archivo donde está la clase Articulo con las functiones y métodos
necesarios para hacer funcionar el área administrativa; pero antes se debe verificar
las cookie llamada acción (Creada con JQuery y su respectivo valor, ver archivo en carpeta js, 
contiene todas las funciones que invicoan este archivo).
*/
include('clasesFunciones.php');

    if(isset($_COOKIE['accion']))
    {
        $articulo = new Articulo();
        switch($_COOKIE['accion'])
        {
            case 0:
                $articulo->agregar();
                break;
            case 1:
                $articulo->editar();
                break;
            case 2:
                $articulo->eliminar();
                break;
            case 3:
                $articulo->menuSubcategorias($_POST['dato1']);
                    break;
            case 4:
                $articulo->menusAtributos($_POST['dato1'], $_POST['dato2']);
                    break;
            case 5:
                $articulo->consultarArt();
                    break;
        }
    }
    else echo "Posiblemente no están las cookies habilitades en el navegador; por favor habilita el uso de cookies."
    
?>