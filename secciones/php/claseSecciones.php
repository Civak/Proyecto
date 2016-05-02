<?php
//SELECT * FROM Productos WHERE idapartado = 'BOD' ORDER BY RAND() LIMIT 9

class Catalogos
{
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
	
	//Random de las primeros  productos de la seccion.
	public function randomCat()
	{
		$this->conectar(0);
		$articulos = "";
		$existen = false;
		$sql = "SELECT codbar FROM Productos WHERE idapartado = '".$_COOKIE['sec']."' ORDER BY RAND() LIMIT 9";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc())
                {
					
					$articulos .= '
					<a id="'.$row['codbar'].'"><div class="product-grid love-grid" ><div style="height: 220px;">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="../imagenes/thumbs/'.$row['codbar'].'_1.jpg" class="thumbnail img-adj" style="min-height:190px; height:190px;" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Ver detalles</button>
							</h4>
							</div>
						</div></div></a>					
						<div class="product-info simpleCart_shelfItem">
						<hr style="border-color: #BFAC9B;">
							<div class="product-info-cust">
							
								<p>Código: <b style="color: #662735;">'.$row['codbar'].'</b></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					';
                }

				$existen = true;
        }
		
		if($existen)
		{
			echo $articulos;
		}
		
		$this->conn->close();
	}
	
	//primeros  productos de la seccion.
	public function primerosArt()
	{
		$this->conectar(0);
		$articulos = "";
		$existen = false;
		$sql = "SELECT codbar FROM Productos WHERE idapartado = '".$_COOKIE['sec']."' AND idsubcategoria = ".$_COOKIE['art']." LIMIT 0, 9";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc())
                {
					
					$articulos .= '
					<a id="'.$row['codbar'].'"><div class="product-grid love-grid" ><div style="height: 220px;">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="../imagenes/thumbs/'.$row['codbar'].'_1.jpg" class="thumbnail img-adj" style="min-height:190px; height:190px;" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Ver detalles</button>
							</h4>
							</div>
						</div></div></a>					
						<div class="product-info simpleCart_shelfItem">
						<hr style="border-color: #BFAC9B;">
							<div class="product-info-cust">
							
								<p>Código: <b style="color: #662735;">'.$row['codbar'].'</b></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					';
                }

				$existen = true;
        }
		
		if($existen)
		{
			echo $articulos;
		}
		else 
		{
			echo -1;
		}
		
		$this->conn->close();
	}
	
	//De 9 en 9  productos de la seccion.
	public function masArt()
	{
		$this->conectar(0);
		$articulos = "";
		$existen = false;
		$sql = "SELECT codbar FROM Productos WHERE idapartado = '".$_COOKIE['sec']."' AND idsubcategoria = ".$_COOKIE['art']." LIMIT ".$_POST['con'].", 9";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc())
                {
					
					$articulos .= '
					<a id="'.$row['codbar'].'"><div class="product-grid love-grid" ><div style="height: 220px;">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="../imagenes/thumbs/'.$row['codbar'].'_1.jpg" class="thumbnail img-adj" style="min-height:190px; height:190px;" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Ver detalles</button>
							</h4>
							</div>
						</div></div></a>					
						<div class="product-info simpleCart_shelfItem">
						<hr style="border-color: #BFAC9B;">
							<div class="product-info-cust">
							
								<p>Código: <b style="color: #662735;">'.$row['codbar'].'</b></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					';
                }
				$existen = true;
        }
		
		if($existen)
		{
			
			echo $articulos;
		}
		else 
		{
			echo -1;
		}
		
		$this->conn->close();
	}
	
	//Carga artículo en modal box
		public function cargaArt()
		{
			$this->conectar(0);
		$articulos = "";
		$det = "";
		$des = "";
		$imgprin = $_POST['cod'];
		$existen = false;
		$sql = "SELECT  codbar, descripcion, detalles, imagenes FROM Productos as pro INNER JOIN (SELECT * FROM Imagenes WHERE imagenes LIKE '%".$imgprin."%') as img  WHERE codbar = ".$imgprin;
        $result = $this->conn->query($sql);
        $i = 2;
        if ($result->num_rows > 0) {
				$articulos .= '<div class="row">';
                while($row = $result->fetch_assoc())
                {
					
					$articulos .= '
					  <div class="col-sm-5 col-md-6">
					  <a href="../imagenes/'.$row['imagenes'].'" class="swipebox" title="Código: '.$row['codbar'].'">
					  <span class="thumbnail thumbsShadow" style="border: 1px solid #CCC">
					  <img style="min-height:140px; height:140px;" id="zoom_0'.$i.'" src="../imagenes/thumbs/'.$row['imagenes'].'" data-zoom-image="../imagenes/'.$row['imagenes'].'"/>
					  </span></a></div>
					';
					$des = $row['descripcion'];
					$det = $row['detalles'];
					$i++;
                }
				
				$articulos .= '<div class="col-sm-5 col-md-6" style="text-align: justify; text-justify: inter-word;"><b style="color: #662735;">Descripción: </b>'.$des.'
				</div><div class="col-sm-5 col-md-6"><b>Detalles: </b><br>';
				$deta = explode(",", $det);
				
				for($ini = 0; $ini < count($deta) - 1; $ini++)
				{
					$articulos .= $deta[$ini] . '<br>';
				}
				
				$articulos .= '<br><p class="infoPics">Click sobre la imagen para ver detalles</p>';
				$articulos .= '</div>
				        <script type="text/javascript">
						  $(document).ready(function(){
							$(".swipebox").swipebox({
								useCSS : true,
								hideBarsDelay : 5000,
								});
							});
					  </script>
				</div>';
				
				$sql = "UPDATE Vistas SET contador = (contador + 1) WHERE codbar = ".$imgprin;
					if ($this->conn->query($sql) === TRUE) {
					} else {
					}
				$existen = true;
        }
		
		if($existen)
		{
			
			echo $articulos;
		}
		else 
		{
			echo -1;
		}
		
		$this->conn->close();
		}
		
		//Funcion que busca articulos
		public function buscarArt()
		{
			$this->conectar(0);
			$sql = "";
			$deDonde = false;
			if(strcmp($_COOKIE['sec'], "BUS") === 0 && !isset($_POST['cont'])){
				$deDonde = true;
				$_POST['cont'] = 0;
			}
			//$palabras = str_replace("  "," ",$_COOKIE['busqueda'])." ";
			
			if(is_numeric($_COOKIE['busqueda'])){
				$sql = "SELECT codbar, descripcion FROM Productos as pro  WHERE codbar LIKE '%".$_COOKIE['busqueda']."%' LIMIT ".$_POST['cont'].", 9";
				}
			else{
			$palabras = explode(" ",$_COOKIE['busqueda']);
			switch(count($palabras))
			{
				case 1:
				$sql = "SELECT codbar, descripcion FROM Productos as pro WHERE (descripcion LIKE '%".$palabras[0]."%') LIMIT ".$_POST['cont'].", 9";
				break;
				case 2:
				$sql = "SELECT codbar, descripcion FROM Productos as pro WHERE (descripcion LIKE '%".$palabras[0]."%' AND descripcion  LIKE '%".$palabras[1]."%') LIMIT ".$_POST['cont'].", 9";
				break;
				case 3:
				$sql = "SELECT codbar, descripcion FROM Productos as pro WHERE (descripcion LIKE '%".$palabras[0]."%' AND descripcion  LIKE '%".$palabras[1]."%' AND descripcion  LIKE '%".$palabras[2]."%') LIMIT ".$_POST['cont'].", 9";
				break;
				case 4:
				$sql = "SELECT codbar, descripcion FROM Productos as pro WHERE (descripcion LIKE '%".$palabras[0]."%' AND descripcion  LIKE '%".$palabras[1]."%' AND descripcion  LIKE '%".$palabras[2]."%' AND descripcion  LIKE '%".$palabras[3]."%') LIMIT ".$_POST['cont'].", 9";
				break;
			}
			}
			$articulos = "";
			$existen = false;
			$result = $this->conn->query($sql);
        	$i = 0;
        		if ($result->num_rows > 0) {
					if(intval($_POST['cont']) == 0){
						$articulos .= '<h3>Resultados de la búsqueda.</h3><hr style="border-color: #662735;">';
					}
                while($row = $result->fetch_assoc())
					  {
						  $articulos .= '
					<a id="'.$row['codbar'].'"><div class="product-grid love-grid" ><div style="height: 220px;">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="../imagenes/thumbs/'.$row['codbar'].'_1.jpg" class="thumbnail img-adj" style="min-height:190px; height:190px;" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Ver detalles</button>
							</h4>
							</div>
						</div></div></a>					
						<div class="product-info simpleCart_shelfItem">
						<hr style="border-color: #BFAC9B;">
							<div class="product-info-cust">
							
								<p>Código: <b style="color: #662735;">'.$row['codbar'].'</b></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					';
					$i++;
					  }
					  $existen = true;
				}
			
			if($existen)
			{
				if($i == 9 && intval($_POST['cont']) == 0){
				$articulos .= '
					<div class="row" id="mostrar-mas">
					<div class="col-xs-6 col-md-4"></div>
					<div class="col-xs-6 col-md-4">
					<button type="button" class="btn btn-c1" id="mas-art" value="9">Mostrar más</button>
					</div>
					<div class="col-xs-6 col-md-4"></div>
					</div><br>
				';
				}
				echo $articulos;
			}
			else 
			{
				//Si viene la cookie desde la área de admin, primero se evalua. Ver primeras líneas de la función.
				if($deDonde)
				{
					echo "<div class='noResultados'><p><b>Ups... no se han encontrado coicidencias de la búsqueda.</b></p></div>";
				}
				else { //En caso se venir de cualquier otra sección.
					echo -1;
				}
			}
			
			$this->conn->close();
		}
}
?>