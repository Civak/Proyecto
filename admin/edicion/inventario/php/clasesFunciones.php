<?php
    

    class Estadisticas
    {//----------------- inicia clase Estadísticas
        //Atributo que servirá para establecer conexiones a la BD.
        private $conn;
        
		//función para conectar a la BD con los parametros respectivos. 
        public function conectar($dirarchivo)
        {
			/*En este caso AJAX causa problemas de ubicación de archivos, se utiliza datos.php que incluye 
			los datos del servidor. Entonces en algunas acciones se requiere regresar dos carpetas atrás
			y en otra una solamente. 
			*/
        if($dirarchivo == 0) include('../../php/datos.php');
        else include('../php/datos.php');
        
           $this -> conn = new mysqli($host, $user, $pw, $db);
           $this->conn->set_charset('utf8');
        if (mysqli_connect_error()) {
            die("Error en conexión, intenta de nuevo.");
        }
        
        }
		
        //-----función que imprime codigo de barras.
        function imprimirCB()
        {
			error_reporting(E_ALL ^ E_NOTICE);
        $codbar = $_POST['cod'];   
        $existen = false;
        $this->conectar(0);
        $sql = "SELECT codbar FROM productos WHERE codbar = ".$codbar;
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                {
                   $existen = true;
                }
            }
            
            if($existen)
            {
                echo 1;
				setcookie("codbar", $codbar, time() + (60 * 5), "/");
            }
            else
            {
                echo -1;
            }
            $this->conn->close();
            unset($this->conn);
        }
        
		//----- Función para mostrar el inventario actual.
		 function listarInventario()
        {  
        $direcciones = '';
		$total = 0;
        $existen = false;
        $this->conectar(0);
        $sql = "SELECT pro.codbar as cod, apa.seccion as sec, sub.subcategoria as sub, pro.descripcion as des, pro.existencia as exi, pro.precio as pre FROM productos AS pro INNER JOIN apartado AS apa ON pro.idapartado = apa.id INNER JOIN subcategorias as sub ON pro.idsubcategoria = sub.id";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $direcciones .= '<h3 style="color: #00a0dc;">Inventario Actual.</h3><hr>
				<div style="height: 460px; overflow-y: scroll; background:#fff;" class="input-login">
                    <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Apartado</th>
						<th>Categoria</th>
						<th>Descripción</th>
						<th>Existencia</th>
						<th>Precio $</th>
                      </tr>
                    </thead>
                    <tbody>';
                while($row = $result->fetch_assoc())
                {
					$total++;
                    $direcciones .= '
                        <tr>
                        <td>'.$row['cod'].'</td>
                        <td>'.$row['sec'].'</td>
						<td>'.$row['sub'].'</td>
						<td>'.$row['des'].'</td>
                        <td>'.$row['exi'].'</td>
						<td>'.$row['pre'].'.00</td>
                      </tr>
                    ';
                }
                $existen = true;
                $direcciones .= '
                        </tbody>
                      </table>
					  </div><hr><b>Total de artículos:</b> '.$total;
            }
            
            if($existen)
            {
                echo $direcciones;
            }
            else
            {
                echo -1;
            }
            $this->conn->close();
            unset($this->conn);
        }
		
    }//----------- termina clase Estadísticas.


?>