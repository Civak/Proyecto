<?php
session_start();
ob_start();

class Conexiones
{
    //Atributos globales. 
    private $host="localhost";
    private $user="root";
    private $pw="varcheli123";
    private $db="varcheli";
    private $conn;
    
    //--------------- función para conectar
    public function conectar()
    {
       $this -> conn = new mysqli($this->host, $this->user, $this->pw, $this->db);
       $this->conn->set_charset('utf8');
        if (mysqli_connect_error()) {
            die("Error en conexión: " . mysqli_connect_error());
        } 
        
    }
    
    //--------------- Verificar y crear sesión. 
    public function crearSesion($usuario, $pass)
    {
        $encontrado = false;
        $this->conectar();
        $sql = "SELECT usuario, password FROM Acceso";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["password"], crypt($pass, $row["password"])) && strcmp($row["usuario"], $usuario) == 0)
                    {
                        $_SESSION['usuario'] = $row["usuario"];
                        $encontrado = true;
                    }
                }
            } else {
                echo -1;
            }
            
            $this->conn->close();
            if($encontrado)
            {
                echo 1;
            }else echo -1;
    
    }
    
    //-----------------------------------------------------------
    public function verificarUsPr($usuario, $respuesta)
    {
        $encontrado = false;
        $this->conectar();
        $sql = "SELECT id, usuario, respuesta FROM Acceso";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (strcmp($row["usuario"], $usuario) == 0 && strcmp($row["respuesta"], $respuesta) == 0)
                    {
                        $encontrado = true;
                        setcookie("id", $row["id"], time()+600);
                        break;
                    }
                }
            } else {
                echo -1;
            }
            
            $this->conn->close();
            if($encontrado)
            {
                echo 1;
            }else echo -1;
    }
    
    //---------------------------------------------------------------------
    public function recuperarCue($pwd, $pwd2)
        {
        
        $this->conectar();
		error_reporting(E_ALL ^ E_NOTICE);
		$newpass = crypt($pwd);
        $sql = "UPDATE Acceso SET password='".$newpass."' WHERE id=".$_COOKIE['id']."";
        
                if ($this->conn->query($sql) === TRUE) {
                        echo 2;
                } else {
                        echo -1;
                }
                    
                
             
    
            $this->conn->close();
            
        }
    
    //----------------------- Registro de IP y sección donde se ha clickeado
    public function registrarVisita()
    {
		if (isset($_COOKIE["sec"]))
		{
        $ip;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $this->conectar();
        $sql = "INSERT INTO Visitas (dir_ip, fecha, idseccion) VALUES ('".$ip."', CURRENT_TIMESTAMP, '".$_COOKIE['sec']."')";
        if ($this->conn->query($sql) === TRUE) {

            } else {
             
            }
        $this->conn->close();
		}
    }
    
    //----------------------------------- Crear Menu de Apartados
    public function crearMenu($apartado)
    {
        $menu = '';
        $tab = 1;
        $this->conectar();
        $sql = "SELECT idsubcategoria, subcategoria FROM Menu as Men
        INNER JOIN Subcategorias as Sub
        ON Men.idsubcategoria = Sub.id WHERE Men.idapartado = '".$apartado."'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
			$menu .= '<ul class="nav nav-pills nav-stacked">';
                while($row = $result->fetch_assoc())
                {
					$menu .= '<li class="li-bg"  id="'.$row['idsubcategoria'].'"><a>'.$row['subcategoria'].' &raquo;</a></li>';
                }
				$menu .= '</ul>';
        }
         echo $menu;
        if($tab != 1)
        {
            echo $menu;
        }
        $this->conn->close();
    }
    
    //---------------------- Imprimir dirección del Footer. 
    public function imprimirDireccion()
    {
        $direcciones = '';
        $existen = false;
        $this->conectar();
        $sql = "SELECT nombre, direccion, telefono FROM Tiendas WHERE 1";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                {
                    $direcciones .= '<p>'.$row['nombre'].'<br>'.$row['direccion'].' Tel: '.$row['telefono'].'</p>';
                }
                $existen = true;
            }
            
            if($existen)
            {
                $direcciones .= '<br><br>';
                echo $direcciones;
            }
            $this->conn->close();
    }
    
    public function paginador($seccion)
    {
        $hay = false;
        $this->conectar();
        $info = "";
            $sql = "SELECT COUNT(idapartado) as num FROM Productos WHERE idapartado = '".$seccion."'";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $info = $row['num'];
                }
                $hay = true;
            }
            
            if($hay)
            {
                if(intval($info) > 0)
                {
                    $paginas = (intval($info) / 9);
                    if(($info - ($paginas * 9)) > 0)
                    {
                        $paginas++;
                    }
                    
                    $limit = 0;
                    $info = '<nav><ul class="pagination" id="paginador">';
                    for($i = 0; $i < $paginas; $i++)
                    {
                        if($i == 0)
                        {
                            $info .= '
                        <li id="'.$limit.'" class="active"><a href="#">'.($i + 1).'</a></li>
                        ';
                        }
                        else{
                            $info .= '
                        <li id="'.$limit.'"><a>'.($i + 1).'</a></li>
                        ';
                        }
                        $limit+=9;
                    }
                    $info .= "</ul></nav>";
                    
                    echo $info;
                }
            }
    }
}

 ?>