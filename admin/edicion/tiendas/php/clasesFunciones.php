<?php
    

    class Tienda
    {//----------------- inicia clase Tienda
        
        private $conn;
        
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
        
        //-----Función que actualiza datos modificados de la tienda..
       function actualizar()
        {
            $this->conectar(0);
            
            $sql = "UPDATE Tiendas SET nombre='".$_POST["nombre"]."', direccion='".$_POST["direccion"]."', telefono='".$_POST["telefono"]."' WHERE idtienda=".$_POST["idtienda"];
            
            if ($this->conn->query($sql) === TRUE) {
                echo "Actualización de la Tienda # ".$_POST["idtienda"];
                } else {
                 echo "Ocurrió un error,  intenta de nuevo.";
                }
                
            $this->conn->close();
        }
        
        //-----función que elimina los datos de BD sobre tiendas y si los campos son dejados en blanco.
        function eliminar()
        {
            $this->conectar(0);
            
            $sql = "UPDATE Tiendas SET nombre='', direccion='', telefono='' WHERE idtienda=".$_POST["idtienda"];
            
            if ($this->conn->query($sql) === TRUE) {
                echo "Eliminación correcta de datos de la Tienda # ".$_POST["idtienda"];
                } else {
                 echo "Ocurrió un error,  intenta de nuevo.";
                }
                
            $this->conn->close();
        }
        
        //-----función que muestra los datos actuales en input-text para ser modificados.
        function mostrar()
        {
            
        $direcciones = '';
        $numdir = 1;
        $existen = false;
        $this->conectar(1);
        $sql = "SELECT idtienda, nombre, direccion, telefono FROM Tiendas WHERE 1";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $direcciones .= '<div class="row">
                    <h4>1.- Marca la casilla para actualizar o eliminar datos de una tienda.</h4><hr>';
                while($row = $result->fetch_assoc())
                {
                    $direcciones .= '<div class="col-xs-6"><form id="dir'.$numdir.'">';
                    
                    $direcciones .= '<div class="checkbox">
                                  <label><input type="checkbox" value="'.$row['idtienda'].'" name="idtienda"><b class="infoObligatoria">Marcar para Actualizar/Eliminar</b></label>
                                </div><br>';
                    
                    $direcciones .= '<div class="form-group">
                                      <label for="nombre">Nombre Tienda #'.$numdir.':</label>
                                      <input type="text" class="form-control input-login" id="nombre" name="nombre" placeholder="'.$row['nombre'].'">
                                      <br>
                                      <label for="direccion">Dirección: </label>
                                      <textarea class="form-control input-login" rows="5" id="direccion" name="direccion" placeholder="'.$row['direccion'].'"></textarea>
                                      <br>
                                      <label for="telefono">Telefono:</label>
                                      <input type="text" class="form-control input-login" id="telefono" name="telefono" placeholder="'.$row['telefono'].'">
                                    </div>';
                    
                    $direcciones .= '</form></div>';
                    $numdir++;
                }
                $existen = true;
                $direcciones .= '<div class="col-xs-6"></div>';
                
                $direcciones .= '<div class="col-xs-6 text-right"><hr><h4>2.- Confirmar Actualizar o Eliminar selección.</h4><br>
                <button type="button" class="btn btn-c1" id="eli-tienda"  title="Solo marca los datos de la tienda a eliminar">Eliminar</button>
                <button type="button" class="btn btn-c2" id="act-tienda" title="Actualiza los datos de las tiendas.">Actualizar</button>
                </div>';
                
                $direcciones .= '</div>';
            }
            
            if($existen)
            {
                $direcciones .= '<br><br>';
                echo $direcciones;
            }
            $this->conn->close();
            unset($this->conn);
        }
        
    }//----------- termina clase Tienda

?>