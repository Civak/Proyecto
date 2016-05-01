<?php
    class Articulo
    {//----------------- inicia clase Articulo
        
		//Atributos privados accesibles para todas las funciones. 
        private $conn;
        private $codebar;
        
		/*Función para crear el objeto conexión, el paradigma utilizado 
		fue orientado a objetos. 
		*/
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
		/*
		El primer paso es verificar si todas las imagenes cumplen menor del peso válido, que no sobre pasen los 3MB, 
		posteriormente se evaluan si realmente tiene un archivo el objeto HTML input. 
		*/
		    $permitido = true;
			$limite = (1024 * 1024 * 3);
			if($_FILES['img1']["size"] > $limite || $_FILES['img2']["size"] > $limite || $_FILES['img3']["size"] > $limite || $_FILES['img4']["size"] > $limite){ $permitido = false;}
			
			//Si se cumple lo anterior comieza a cargar las imagenes en la carpeta del servidor y crear los thumbs.
			if($permitido)
			{
				$this->conectar(0);
			    $this->generaCodigos();
            /*imagenes del formulario, la función cargarImagenes tiene dos parametros, los cuales son: el  nombre de la imagen es decir
			del input, y el número de dicha imagen que servirá para renombrarla. 
			*/
            if($_FILES['img1']["size"] != 0){
                $this->cargarImagenes("img1", 1);
            }
            if($_FILES['img2']["size"] != 0){
                $this->cargarImagenes("img2", 2);
            }
            if($_FILES['img3']["size"] != 0){
                $this->cargarImagenes("img3", 3);
            }
            if($_FILES['img4']["size"] != 0){
                $this->cargarImagenes("img4", 4);
            }
            
			/*insertar campos en la BD, después de cargar las imagenes y no exista un error durante
			el proceso de carga de imagenes. 
			*/
            $this->insertarValor();
			//Se cierra conexión.
            $this->conn->close();
			}
			else 
			{	//En caso de no cumplir con el peso valido, se regresa un entero (ver archivo de JS).
				echo -2;	
			}
            
        }
        
        function cargarImagenes($imagen, $numero)
        {
            $ruta = "../../../../secciones/imagenes/";
            $nombreAntiguo = $_FILES[$imagen]['name'];
              $nombre_tmp = $_FILES[$imagen]['tmp_name'];
              $tipo = $_FILES[$imagen]['type'];
            
              $ext_permitidas = array('jpg','jpeg','gif','png');
              $partes_nombre = explode('.', $nombreAntiguo);
              $extension = end( $partes_nombre );
              $extension = strtolower($extension);
              $nombre = $this->codebar . "_".$numero.".".$extension;
              $ext_correcta = in_array($extension, $ext_permitidas);
            
              $tipo_correcto = preg_match('/^image\/(pjpeg|jpeg|gif|png)$/', $tipo);
            
            
              if( $ext_correcta && $tipo_correcto){
                if( $_FILES[$imagen]['error'] > 0 ){
                  //echo 'Error: verifica el tamaño o formato correcto.';
                }else{
            
                  if( file_exists($ruta.$nombre) ){
                    //echo 'Ups... ocurrió un error, intenta de nuevo.';
                  }else{
                    move_uploaded_file($nombre_tmp, $ruta.$nombre);
                    chmod($ruta.$nombre, 0777);
					$this->marcaAgua($ruta.$nombre, $ruta);
					$this->crearThumbs($ruta.$nombre);
                    
                     $sql = "INSERT INTO Imagenes VALUES ('".$nombre."');";
                        if ($this->conn->query($sql) === TRUE) {
                           // echo 1;
                          
                        } else {
                        //    echo -1;
                          
                        }
                    //echo "mueve imagen";
                  }
                }
              }else{
                  die();
              }
        }
        
		//--------- Función para colocar marca de agua en la imagen subida.
		public function marcaAgua($imagen, $dir)
		{
			$marcadeagua = $dir.'estampa.png';
			$margen = 10;
			  //Averiguamos la extensión del archivo de imagen
				  $trozos_nombre_imagen=explode(".",$imagen);
				  $extension_imagen=$trozos_nombre_imagen[count($trozos_nombre_imagen)-1];
			  
				  //Creamos la imagen según la extensión leída en el nombre del archivo
				  if(preg_match('/jpg|jpeg|JPG|JPEG/',$extension_imagen))
					  $img=ImageCreateFromJPEG($imagen); 
					  if(preg_match('/png|PNG/',$extension_imagen)) 
						  $img=ImageCreateFromPNG($imagen); 
					  if(preg_match('/gif|GIF/',$extension_imagen)) 
						  $img=ImageCreateFromGIF($imagen); 
				  
				  //declaramos el fondo como transparente	
				  ImageAlphaBlending($img, true);
					  
				  //Ahora creamos la imagen de la marca de agua
				  $marcadeagua = ImageCreateFromPNG($marcadeagua);
				  
				  //Hallamos las dimensiones de ambas imágenes para alinearlas
				  $Xmarcadeagua = imagesx($marcadeagua);
				  $Ymarcadeagua = imagesy($marcadeagua);
				  $Ximagen = imagesx($img);
				  $Yimagen = imagesy($img);
				  
				  //Copiamos la marca de agua encima de la imagen (alineada abajo a la derecha)
				  imagecopy($img, $marcadeagua, $Ximagen-$Xmarcadeagua-$margen, $Yimagen-$Ymarcadeagua-$margen, 0, 0, $Xmarcadeagua, $Ymarcadeagua);
				  
				  //Guardamos la imagen sustituyendo a la original, en este caso con calidad 100
				  ImageJPEG($img,$imagen,100);
				  
				  //Eliminamos de memoria las imágenes que habíamos creado
				  imagedestroy($img);
				  imagedestroy($marcadeagua);
		}
		//------------------ Función para crear thumbs, despues de cargar las imagenes al servidor.
        function crearThumbs($img)
        {
            	$targ_w = 166;
				$targ_h = 194;
            	$jpeg_quality = 90;
            	$ruta = "../../../../secciones/imagenes/thumbs/";
            	$src = $img;
            	$partes_nombre = explode('/', $src);
               $nombre = end( $partes_nombre );
            	
            	
            	// Sacamos la extensión del archivo
            $ext = explode(".", $src);
            $ext = strtolower($ext[count($ext) - 1]);
            if ($ext == "jpeg") $ext = "jpg";
             
            // Dependiendo de la extensión llamamos a distintas funciones
            switch ($ext) {
                    case "jpg":
                            $img_r = imagecreatefromjpeg($src);
                    break;
                    case "png":
                            $img_r = imagecreatefrompng($src);
                    break;
                    case "gif":
                            $img_r = imagecreatefromgif($src);
                    break;
            }
            	
            	
            	$width = imagesx($img_r);
            	$height = imagesy($img_r);
            	$desired_width = 166;
            	$desired_height = floor($height * ($desired_width / $width));
            	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
            	imagecopyresampled($virtual_image, $img_r, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
            	
            switch ($ext) {
                    case "jpg":
                            imagejpeg( $virtual_image,$ruta.$nombre, $jpeg_quality);
                    break;
                    case "png":
            					$pngquality = floor(($jpeg_quality - 10) / 10);
            					 imagepng($virtual_image,$ruta.$nombre, $pngquality);
                    break;
                    case "gif":
                    			imagegif($virtual_image,$ruta.$nombre); 
                    break;
            }	
            	//Añadimos permisos de lectura y escritura.
            	 chmod($ruta.$nombre, 0777);
        }
        
		//------------ Función que sirve para obtener los detalles del artículo subido, es decir: 
		//Se obtien sección, categoria, etc. 
        function obtenerDetalles($sentencia, $campo){
            $info = "";
            $sql = $sentencia;
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $info = $row[$campo];
                }
            }
            
            return $info;
        }
        
		//Función que inserta los valores textuales del artículo, en cada proceso invoca obtenerDetalles.
		//Que tiene como parametro la sentencia SQL a utilizar.
        function insertarValor()
        {
            /*Se obtienen las variables de los campos a ingresar en la tabla de productos*/
            $Detalles="";
            $Apartado=$_POST["sec"];
            $Subcat=$_POST["subc"];

            $Codigo = $this->codebar;
            
            $Precio=$_POST['pre'];
            $Exis=$_POST["exis"];
            $Descrip=$_POST["des"];

            if(isset($_POST["col"])){ 
                $Detalles .= "Color: " . $this->obtenerDetalles("SELECT color FROM Color WHERE id = ".$_POST["col"], "color") . ",";
            }
            if(isset($_POST["cor"])){ 
                $Detalles .= "Corte: " . $this->obtenerDetalles("SELECT corte FROM Corte WHERE id = ".$_POST["cor"], "corte") . ",";
            }
            if(isset($_POST["tal"])){
                 $Detalles .= "Talla: " . $this->obtenerDetalles("SELECT talla FROM Talla WHERE id = ".$_POST["tal"], "talla") . ",";
            }
            if(isset($_POST["gen"])){ 
                $Detalles .= "Genero: " . $this->obtenerDetalles("SELECT genero FROM Genero WHERE id = ".$_POST["gen"], "genero") . ",";
            }
            if(isset($_POST["tip"])){ 
                $Detalles .= "Tipo: " . $this->obtenerDetalles("SELECT tipo FROM Tipo WHERE id = ".$_POST["tip"], "tipo") . ",";
            } 

            //Finalmente se inserta la información completa del artículo.
            $sql = "INSERT INTO Productos VALUES (".$Codigo.",'".$Apartado."',".$Subcat.",'".$Descrip."','".$Detalles."',".$Exis.",".$Precio.", CURRENT_TIMESTAMP);";
            if ($this->conn->query($sql) === TRUE) {
                echo 1;
              
            } else {
                echo -1;
              
            }
			
			$sql = "INSERT INTO Vistas VALUES (".$Codigo.", 0);";
            if ($this->conn->query($sql) === TRUE) {
                //echo 1;
              
            } else {
                //echo -1;
              
            }
        }
        
        //-----función que edita artículo existente
        function editar()
        {
            echo "Mensaje del server con edición exitosa o malosa";
        }
        
        //------función que elimina articulo existente
        function eliminar()
        {
             $ruta = "../../../../secciones/imagenes/";
            $this->conectar(0);
            $sql = "DELETE FROM Productos WHERE codbar =".$_POST['cod'];
            if ($this->conn->query($sql) === TRUE) {
                
            $sql = "SELECT imagenes FROM Imagenes WHERE imagenes LIKE '%".$_POST['cod']."%'";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (file_exists($ruta.$row['imagenes'])) {
                    unlink($ruta.$row['imagenes']);
                    
                    if (file_exists($ruta."thumbs/".$row['imagenes'])) {
                    unlink($ruta."thumbs/".$row['imagenes']);
                    }
                  }
                }
            }
                
                $sql = "DELETE FROM Imagenes WHERE imagenes LIKE '%".$_POST['cod']."%'";
                if ($this->conn->query($sql) === TRUE) {
                echo 1;
                } else {
                    echo -1;
                }
            } else {
                echo -1;
              
            }
            $this->conn->close();
        }
        
        //------------------ consulta articulo
        public function consultarArt()
        {
            $this->conectar(0);
            $resultado = "";
            $encontro = false;
            $sql = "SELECT codbar, seccion, subcategoria, precio, existencia, detalles, descripcion FROM Productos as pro INNER JOIN Apartado as apa ON apa.id = pro.idapartado INNER JOIN Subcategorias as sub ON sub.id = pro.idsubcategoria WHERE pro.codbar = ".$_POST['cod'];
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $resultado = '
                    <h3>Código: '.$row['codbar'].'</h3><br>
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td><b>Seccion:</b> '.$row['seccion'].'</td>
                        <td><b>Subcategoria:</b> '.$row['subcategoria'].'</td>
                      </tr>
                      <tr>
                        <td><b>Existencia:</b> '.$row['existencia'].'</td>
                        <td><b>Precio:</b> '.$row['precio'].'</td>
                      </tr>
                    </tbody>
                  </table>
                    ';
                    
                $detalles = explode(",", $row['detalles']);
                $resultado .= "<p><hr><b style='color: #00a0dc;'>Detalles: </b><br><b>";
                for($i = 0; $i < count($detalles) - 1; $i++)
                    {
                        $resultado .= $detalles[$i]."<br>";
                    }
                $resultado .= "</b></p><br><p><b style='color: #00a0dc;'>Descripción: </b><br> ".$row['descripcion']."</p><hr>";
                }
                $encontro = true;
            }
            
            
            if($encontro)
            {
                echo $resultado;
            }
            else 
            {
                echo -1;
            }
            
            $this->conn->close();
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
        //---------------- generará numeros aleatorios de codigo de barras
        public function generaCodigos()
        {
            /*Elegi la funcion mt_rand por que genera numeros enteros mas grandes*/
            $code=rand(100, 999) . rand(100, 999) . rand(100, 999) . rand(100, 999);
            if($code<0) $code=($code1*-1);
			$this->codebar = $code;/*Si el numero es negativo lo vuelve positivo*/
            setcookie("codbar", $code, time() + (60 * 5), "/");
            $sql = "SELECT * FROM Productos WHERE codbar = '".$code."'";
            $existecodigo = $this->conn->query($sql);
            if ($existecodigo->num_rows > 0) { /*Si encontro el codigo se llama a si mismo para generar otro numero*/
                generaCodigos();
            }
            return $code;
            /*By Eli*/
        }
    }//----------- termina clase Articulo

?>