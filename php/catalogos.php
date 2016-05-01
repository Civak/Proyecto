<?php
    

    class Tienda
    {//----------------- inicia clase Tienda
        
        private $conn;
        
        public function conectar($dirarchivo)
        {
            include('datos.php');
        
           $this -> conn = new mysqli($host, $user, $pw, $db);
           $this->conn->set_charset('utf8');
        if (mysqli_connect_error()) {
            die("Error en conexión, intenta de nuevo.");
        }
        
        }
        
        public function primeraCarga()
        {
            
        }
        
        public function paginar()
        {
            
        }
        
        public function crearPaginar()
        {
            $info = "";
            $sql = "SELECT COUNT(idapartado) as paginas FROM Productos";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $info = $row[$campo];
                }
            }
            
            return $info;
        }
}

?>