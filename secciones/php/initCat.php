<?php
include('claseSecciones.php');

    if(isset($_COOKIE['art']) && isset($_COOKIE['conta']) && isset($_COOKIE['accion']))
    {
        $articulo = new Catalogos();
        switch($_COOKIE['accion'])
        {
            case 0:
                $articulo->primerosArt();
                break;
            case 1:
                $articulo->masArt();
                break;
            case 2:
                $articulo->cargaArt();
                break;
			case 3:
                $articulo->buscarArt();
                break;
        }
    }
	else{
		if(isset($_COOKIE['accion']) && intval($_COOKIE['accion']) == 2)
		{
			$articulo = new Catalogos();
			$articulo->cargaArt();
		}
		if(isset($_COOKIE['accion']) && intval($_COOKIE['accion']) == 3)
		{
			$articulo = new Catalogos();
			$articulo->buscarArt();
		}
	}
?>