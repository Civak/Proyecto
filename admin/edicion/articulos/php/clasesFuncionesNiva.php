<?php
    class Articulo
    {//----------------- inicia clase Articulo
        
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
        //-----Función que agrega artículo nuevo.
       function agregar()
        {
            $infoFormulario = 'Img1: '.basename($_FILES["img1"]["name"]).' Img2: '.basename($_FILES["img2"]["name"])."<br>";
            $infoFormulario .= 'Img3: '.basename($_FILES["img3"]["name"]).' Img4: '.basename($_FILES["img4"]["name"])."<br>";
            $infoFormulario .= 'Apartado: '.$_POST["sec"]." Codigo: ".$_POST["cod"]." Descrip: ".$_POST["des"]." Precio: ".$_POST['pre'];
            $infoFormulario .= 'Subcat: '.$_POST["subc"]." Color: ".$_POST["col"]." Corte: ".$_POST["cor"];
            echo $infoFormulario." COOKIE: ".$_COOKIE['accion'];
        }
        
        //-----función que edita artículo existente
        function editar()
        {
            echo "Mensaje del server con edición exitosa o malosa";
        }
        
        //------función que elimina articulo existente
        function eliminar()
        {
            echo "Mensaje del server con eliminación exitosa o malosa";
        }
        
        //-------- Generar combo box de apartados 
        public function menuApartados()
        {
        $this->conectar(1);
        $sql = "SELECT id, seccion FROM Apartado WHERE 1";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row['id'].'">'.$row['seccion'].'</option>';
                }
            }
            
            $this->conn->close();
        }
        
        //------------ genera combo de subcategorias
        public function menuSubcategorias($apartado)
        {
        $subcategorias = "";
        $this->conectar(0);
        $error = false;
        $sql = "SELECT id, subcategoria FROM Menu INNER JOIN Subcategorias ON Subcategorias.id = Menu.idsubcategoria WHERE Menu.idapartado = '".$apartado."'";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                    $subcategorias .= '<div class="form-group" id="combosub"><br>
                  <label for="sel1"><b class="infoObligatoria">Subcategoria obligatoria:</b></label>
                  <select class="form-control" id="subc" name="subc">
                    <option value="">-------------------------</option>';
                while($row = $result->fetch_assoc()) {
                    $subcategorias .= '<option value="'.$row['id'].'">'.$row['subcategoria'].'</option>';
                }
                    $subcategorias .= '</select></div>';
                    $error = true;
            }
            
            if($error)
            {
                echo $subcategorias;
            }
            else
            {
                echo -1;
            }
            $this->conn->close();
        }
        
        //------------------ genera el menu de Atributos de cada respectiva subcategoria
        public function menusAtributos($apartado, $subcateg)
        {
        $this->conectar(0);
        $existen = false;
        $sql = "SELECT atributos FROM Menu WHERE idapartado = '".$apartado."' AND idsubcategoria = ".$subcateg;
        $result = $this->conn->query($sql);
        $consultas;


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   $consultas = explode(",", $row['atributos']);
                   $existen = true;
                }
            }
            
            if($existen)
            {
                echo $this->generaCombos($consultas);
            }
            else 
            {
                echo -1;
            }
            
            $this->conn->close();
        }
        
        //---------------- generará los combos correspondientes de cada subcategoria
        public function generaCombos($consultas)
        {
            $combos = "<div id='boxatributos'>";
            $tabla = $consultas;
            for($i = 0; $i < count($tabla) - 1;$i++) {
                $tab = strtolower(trim($tabla[$i]));
                $sql = "SELECT id, ".$tab." FROM ".$tabla[$i]." WHERE 1";
                $result = $this->conn->query($sql);
                
                if ($result->num_rows > 0) {
                    $id = substr($tab, 0, 3);
                    $combos .= '<div class="form-group" id="combo'.$id.'"><br>
                      <label for="sel1"><b class="infoObligatoria">'.$tabla[$i].' (obligatorio):</b></label>
                      <select class="form-control" id="'.$id.'" name="'.$id.'">
                    <option value="">-------------------------</option>';
                while($row = $result->fetch_assoc()) {
                    $combos .= '<option value="'.$row['id'].'">'.$row[$tab].'</option>';
                }
                    $combos .= '</select></div>';
                }
            }
            $combos .= "</div>";
            return $combos;
        }
    }//----------- termina clase Articulo

?>