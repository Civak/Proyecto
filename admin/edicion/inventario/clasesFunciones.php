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
		
        //-----función que muestra las estadísticas de visitas al sitio y sus secciones.
        function visitas()
        {
            $fecini = $_POST['fec-ini'];
            $feciniarray = explode("/", $fecini);
            $fecini = $feciniarray[2]."-".$feciniarray[1]."-".$feciniarray[0];
            
            $fecfin = $_POST['fec-fin'];
            $fecfinarray = explode("/", $fecfin);
            $fecfin = $fecfinarray[2]."-".$fecfinarray[1]."-".$fecfinarray[0];
            
        $direcciones = '';

        $existen = false;
        $this->conectar(0);
        $sql = "SELECT seccion, COUNT(*) as contador FROM Visitas INNER JOIN Apartado ON Visitas.idseccion = Apartado.id WHERE  fecha BETWEEN '".$fecini." 00:00:01' AND '".$fecfin." 23:59:59'GROUP BY idseccion";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $direcciones .= '<h4 style="color: #00a0dc;">Visitas por apartado</h4><hr>
                    <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th>Apartado</th>
                        <th>Visitas</th>
                      </tr>
                    </thead>
                    <tbody>';
                while($row = $result->fetch_assoc())
                {
                    $direcciones .= '
                        <tr>
                        <td>'.$row['seccion'].'</td>
                        <td>'.$row['contador'].'</td>
                      </tr>
                    ';
                }
                $existen = true;
                $direcciones .= '
                        </tbody>
                      </table>
                ';
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
        
		//----- Función para mostrar los artículos más vistos, o más clickeados.
		 function visitasArt()
        {  
        $direcciones = '';

        $existen = false;
        $this->conectar(0);
        $sql = "SELECT pro.codbar as cod, apa.seccion as sec, vis.contador as contador FROM Productos as pro INNER JOIN Apartado as apa ON pro.idapartado = apa.id INNER JOIN Vistas as vis ON pro.codbar = vis.codbar ORDER BY vis.contador DESC";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $direcciones .= '<h4 style="color: #00a0dc;">Productos más vistos.</h4><hr>
				<div style="height: 240px; overflow: scroll;">
                    <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Apartado</th>
						<th>Vistas</th>
                      </tr>
                    </thead>
                    <tbody>';
                while($row = $result->fetch_assoc())
                {
                    $direcciones .= '
                        <tr>
                        <td>'.$row['cod'].'</td>
                        <td>'.$row['sec'].'</td>
						<td>'.$row['contador'].'</td>
                      </tr>
                    ';
                }
                $existen = true;
                $direcciones .= '
                        </tbody>
                      </table>
					  </div>
                ';
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