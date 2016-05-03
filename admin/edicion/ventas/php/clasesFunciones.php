<?php 

    class Ventas
    {//----------------- inicia clase Ventas
        
        private $conn;
        
		//Función que carga la variable conn que sirve como objeto de conexión a la BD
        public function conectar($dirarchivo)
        {
        if($dirarchivo == 0) include('../../php/datos.php');
        else include('../php/datos.php');
        
           $this -> conn = new mysqli($host, $user, $pw, $db);
           $this->conn->set_charset('utf8');
        if (mysqli_connect_error()) {
            die("Error en conexión, intenta de nuevo.");
        }
        
        }
        
        //-----Función para registrar venta.
       function registrarVenta()
        {
        	
        $this->conectar(0);
		if(strcmp($_COOKIE['accion'], "0") === 0)
		{
			$Codigo = $_POST['num-not'];
			$Fecha  = $_POST['fec-not'];
			$Cliente = $_POST['cli-not'];
			$Total = $_POST['tot-not'];
        	$sql = "INSERT INTO Ventas VALUES (".$Codigo.", '".$Fecha."', '".$Cliente."', ".$Total.");";
		}
		else {
			$sql = "DELETE FROM Ventas WHERE id = ".$_POST['cod'];
		}
                       if ($this->conn->query($sql) === TRUE) {
                        echo 1;
                        } else {
                         echo -1;
                        } 
            $this->conn->close();
        }

        
        //-----función que muestra datos de seguridad, es decir pregunta y respuesta. 
        function buscarVenta()
        {
            
        $direcciones = '';
        $existen = false;
        $this->conectar(0);
		error_reporting(E_ALL ^ E_NOTICE);
        $sql = "SELECT id, fecha, cliente, total FROM Ventas WHERE id=".$_POST['cod'];
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
				$direcciones .= '<h3>Resultados</h3><table class="table table-hover table-responsive">';
                while($row = $result->fetch_assoc())
                {
                    $direcciones .= '
						<tbody>
						  <tr>
							<td><b>No. Nota</b><br>'.$row['id'].'</td>
							<td><b>Fecha</b><br>'.$row['fecha'].'</td>
						  </tr>
						  <tr>
							<td><b>Cliente</b><br>'.$row['cliente'].'</td>
							<td><b>Total</b><br>$ '.$row['total'].'.00</td>
						  </tr>
						</tbody>
                    ';
                }
				$direcciones .= '</table><hr>';
                $existen = true;
            }
            
            if($existen)
            {
                echo $direcciones;
            }
			else{
				echo -2;
			}
            $this->conn->close();
            unset($this->conn);
        }
        
    }//----------- termina clase Ventas

?>