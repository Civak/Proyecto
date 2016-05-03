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
        $sql = "INSERT INTO Ventas VALUES (".$Codigo.", CURRENT_TIMESTAMP, '".$Cliente."', ".$Total.");";
                        if ($this->conn->query($sql) === TRUE) {
                        echo 1;
                        } else {
                         echo -1;
                        } 
            $this->conn->close();
        }
        
        //-----función que cambia el nickname
        function nick()
        {
        $pass = $_POST['pwd'];
        $newnick = $_POST['nvo-nick'];
        
        $encontrado = 0;
        $this->conectar(0);
        $sql = "SELECT usuario, password FROM Acceso";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["password"], crypt($pass, $row["password"])) && strcmp($row["usuario"], $_SESSION['usuario']) == 0)
                    {
                        $encontrado = 1;
                        //$result->free();
                        
                        $sql = "UPDATE Acceso SET usuario='".$newnick."' WHERE usuario='".$_SESSION['usuario']."'";
                        if ($this->conn->query($sql) === TRUE) {
                        $_SESSION['usuario'] = $newnick;
                        echo "Cambio de Nick correcto.";
                        } else {
                         echo "Ocurrió un error,  intenta de nuevo.";
                         $encontrado = -1;
                        }
                    }
                }
            } else {
                echo "El password está incorrecto, verifica.";
            }
            
            if($encontrado == 0)
            {
                echo "El password está incorrecto, verifica.";
            }
            $this->conn->close();
        }
		
        //---------Función que sirve para cambiar los datos de seguridad, como es pregunta y respuesta.
        public function seguridad()
        {
        $pass = $_POST['pwd'];
        $pregunta = $_POST['nva-pregunta'];
        $respuesta = $_POST['nva-respuesta'];
        
        $encontrado = 0;
        $this->conectar(0);
        $sql = "SELECT usuario, password FROM Acceso";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["password"], crypt($pass, $row["password"])) && strcmp($row["usuario"], $_SESSION['usuario']) == 0)
                    {
                        $encontrado = 1;
                        //$result->free();
                        
                        $sql = "UPDATE Acceso SET pregunta='".$pregunta."', respuesta='".$respuesta."' WHERE usuario='".$_SESSION['usuario']."'";
                        if ($this->conn->query($sql) === TRUE) {
                        echo "Cambio de Datos de seguridad correctos.";
                        } else {
                         echo "Ocurrió un error,  intenta de nuevo.";
                         $encontrado = -1;
                        }
                    }
                }
            } else {
                echo "El password está incorrecto, verifica.";
            }
            
            if($encontrado == 0)
            {
                echo "El password está incorrecto, verifica.";
            }
            $this->conn->close();
        }
        
        //-----función que muestra datos de seguridad, es decir pregunta y respuesta. 
        function seguridadMostrar()
        {
            
        $direcciones = '';
        $existen = false;
        $this->conectar(1);
        $sql = "SELECT pregunta FROM Acceso WHERE usuario='".$_SESSION['usuario']."'";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                {
                    $direcciones .= '
                        <div class="row">
                        <form id="c-seguridad">
                    		<div class="col-xs-6">
                    		    <h4>1.- Escribe tu contraseña.</h4><hr>
                    		    <div class="form-group">
                                  <label for="pwd"><b class="infoObligatoria">Contraseña actual:</b></label>
                                  <input type="password" class="form-control input-login" id="pwd" name="pwd">
                                </div>
                    		</div>
                    		    <div class="col-xs-6">
                    		    <h4>2.- Escribe tus nuevos datos de recuperación.</h4><hr>
                    		        
                    		    <div class="form-group">
                    		        <div class="checkbox">
                                      <label ><input type="checkbox" value="1" id="check-cambio"><b style="color: #00a0dc;">Cambiar pregunta de seguridad</b></label>
                                    </div><br>
                                  <label for="new-pwd1"><b class="infoObligatoria">Pregunta de Seguridad:</b> <span style="font-size: 12px;">(Distingue entre mayúsculas y minúsculas)</span></label>
                                  <input type="text" class="form-control input-login" id="nva-pregunta" name="nva-pregunta" value="'.$row['pregunta'].'" disabled>
                                </div><br>
                                
                                <div class="form-group">
                                  <label for="new-pwd1"><b class="infoObligatoria">Respuesta de Seguridad:</b> <span style="font-size: 12px;">(Distingue entre mayúsculas y minúsculas)</span></label>
                                  <input type="text" class="form-control input-login" id="nva-respuesta" name="nva-respuesta">
                                </div>
                                
                                <button type="button" class="btn btn-c2 text-right" id="confi-seg-cam">Confirmar cambios</button>
                    		    </div>
                        </form>
                    </div>
                    ';
                }
                $existen = true;
            }
            
            if($existen)
            {
                echo $direcciones;
            }
            $this->conn->close();
            unset($this->conn);
        }
        
    }//----------- termina clase Perfil

?>