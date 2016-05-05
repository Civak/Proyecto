<?php
    

    class Edicion
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
        function buscar()
        {
            //$codigo = $_POST['cod'];
            $tabla = $_POST['tab'];
            
        $direcciones = '';

        $existen = false;
        $this->conectar(1);
        $sql = "SELECT id, ".strtolower($tabla)." as des FROM ".$tabla." WHERE 1";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $direcciones .= '<h4 style="color: #00a0dc;">Datos actuales de: <b>'.$tabla.'</b></h4><hr>
				<div style="height: 200px; overflow-y: scroll;">
                    <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                      </tr>
                    </thead>
                    <tbody>';
                while($row = $result->fetch_assoc())
                {
                    $direcciones .= '
                        <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['des'].'</td>
                      </tr>
                    ';
                }
                $existen = true;
                $direcciones .= '
                        </tbody>
                      </table></div>
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
        
		//----- Función para eliminar datos depende de la tabla
		 function eliminar()
        {  
        	$codigo = $_POST['cod'];
            $tabla = $_POST['tab'];
			//error_reporting(E_ALL ^ E_NOTICE);
			$this->conectar(1);
			$sql = "SELECT * FROM ".$tabla." WHERE id=".$codigo;
        	$result = $this->conn->query($sql);

            if ($result->num_rows > 0){
				$sql = "DELETE FROM ".$tabla." WHERE id=".intval($codigo);
			
				if ($this->conn->query($sql) === TRUE) {
						echo 1;
					} else {
						echo -2;
					}
			}else echo -2;
			
            $this->conn->close();
        }
		//----- Función para insertar datos que dependen de la tabla en cuestion
		 function ingresarnuevo()
        {  
        	$des = $_POST['cod'];
            $tabla = $_POST['tab'];
			//error_reporting(E_ALL ^ E_NOTICE);
			$this->conectar(1);

			$sql = "INSERT INTO ".$tabla." (tipo) VALUES ('".$des."');";
				
				if ($this->conn->query($sql) === TRUE) {
					echo 2;
				} else {
					echo -3;
				}

            $this->conn->close();
        }
		
    }//----------- termina clase Estadísticas.


?>