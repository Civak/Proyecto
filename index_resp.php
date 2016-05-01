<?php
    if(!isset($_COOKIE['carrusel'])) //si no se ha colocado cookie, se redirecciona y se crea además.
    {
        setcookie("carrusel", "carrusel");
        setcookie("sec", "CAR", time() + (3600 * 8), "/");
        header('Location: carrusel.php', time() + 3600);
    }
    
    include('php/objetos_RegClicks.php');
?>
<!DOCTYPE html>
<html>
<head>
<!------------------------- Se incluye todo el choricero de la etiqueta head, como un modulo. Ya que las mismas lineas 
se repiten en la página de contacto.php ----------------->
    <?php include('modulos/etiqueta_head.php'); ?>
<!------------------------------------------------------------------------------------>
</head>
<body> 
<!----------------------PLUGIN DE FACEBOOK--------------------------------->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!------------------------------------------------------------------------->
<!--header-->	
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<li><a href="#"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>|
					<li><a href="contacto.php"><span class="glyphicon glyphicon-hand-right"></span> Visitanos</a></li> | 
					<li><a href="admin/login/login.php"> Admin</a></li>
				</ul>
			</div>
			<div class="top_left">
			    
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar" id="buscar" name="buscar" class="test" data-toggle="tooltip" data-placement="left" title="Buscar artículo, vestido, código, trajes, etc.">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!----------------Se incluye el menú, ya que está en dos páginas y es más fácil editarlo siendo modulo--------------------------------->
    <?php include('modulos/menu.php'); 
    ?>
<!------------------------------------------------------------------------->
<div class="banner">
	 <div class="container">
	 </div>
</div>
<!------------------------------------------------------------------------->
<div class="welcome" id="welcome">
	 <div class="container fondoBlanco">
		 <div class="col-md-4 welcome-left">
			 <h2>Bienvenidos</h2>
		 </div>
		 <div class="col-md-8 welcome-right">
			 <h3>Tenemos los mejores vestidos para que esa ocasión sea única y especial.</h3>
			 <p>Contamos con los mejores vestidos de novia, XV años, primeras comuniones, trajes de niño y caballero
			 y artículos para ese momento inolvidable.</p>
		 </div>
	 </div>
</div>
    <hr style="border-color: #00a0dc;">
<!------------------------------------------------------------------------->
<div class="bride-grids">
	 <div class="container fondoBlanco">
			 
             <div class="col-md-4 bride-grid">
                 
                 <div class="content-grid l-grids">
                     <figure class="effect-bubba">
                           <img src="images/bautizos_c.jpg" alt=""/></a>
                            <a href="secciones/apartados/index_resp.php"><figcaption>
                                <h4>Bautizos</h4>
                                <p>Todo para el Bautizo.</p>																
                            </figcaption></a>			
                     </figure>
                     <div class="clearfix"></div>
                     <h3>Bautizos</a></h3>
                 </div>
                 <div class="content-grid l-grids">
				 <figure class="effect-bubba">
						<img src="images/vestido-xv_c.jpg" alt=""/>
						<a href="secciones/apartados/index_resp.php"><figcaption>
							<h4>XV Años</h4>
							<p>Tenemos los mejores vestidos XV Años.</p>																
						</figcaption></a>			
				 </figure>	
				 <div class="clearfix"></div>
				 <h3>XV Años</h3>
			 </div>
             </div>
		 <div class="col-md-4 bride-grid">
				<div class="content-grid l-grids">
						<a href="secciones/apartados/index_resp.php"><img src="images/bodas_c.jpg" alt=""/></a>
				 <h3>Bodas</h3>
			 </div>
		 </div>
		 <div class="col-md-4 bride-grid">
			 <div class="content-grid l-grids">
				 <figure class="effect-bubba">
						<img src="images/presentacion_c.jpg" alt=""/>
						<a href="secciones/apartados/index_resp.php"><figcaption>
							<h4>Presentaciones</h4>
							<p>Los mejores accesorios para ese momento único.</p>																
						</figcaption></a>			
				 </figure>	
				 <div class="clearfix"></div>
				 <h3>Presentaciones</h3>
			 </div>
			 <div class="content-grid l-grids">
				 <figure class="effect-bubba">
						<img src="images/comunion_c.jpg" alt=""/>
						<a href="secciones/apartados/index_resp.php"><figcaption>
							<h4>Primera Comunión</h4>
							<p>Todo para primera comunión.</p>																
						</figcaption></a>		
				 </figure>
					<div class="clearfix"></div>
				 <h3>Primera Comunión</h3>
			 </div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!---------------------------------------------CARRUSEL-------------------------------------------------------------------->
					 </div>

<!------------------------------------------------------------------------------------------------------------------------->
<div id="contacto" class="shoping">
    <div class="container">
        <div class="col-xs-6 col-md-4">
        </div>
        <div class="col-xs-6 col-md-4 shpng-grid">
            <h3>Direcciones</h3>
            <?php
                $direccion = new Conexiones();
                $direccion->imprimirDireccion();
            ?>
            <a href="contacto.php" class="test" data-toggle="tooltip" data-placement="top" title="Visítanos en la siguiente dirección"><span class="glyphicon glyphicon-search"></span>Click aquí para mostrar mapa.</a>
        </div>
        <div class="col-xs-6 col-md-4 shpng-grid">
            <h3>Siguenos por Facebook</h3>
            <br/>
            <p><div class="fb-like" data-href="https://www.facebook.com/Casa-Vacheli-932894540157179/?notif_t=page_admin" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></p>
        </div>
     </div>
</div>
<!------------------------------------------------------------------------------------------------------------------------->  
<div  class="footer"> 
     <div class="copywrite">
        <div class="col-md-4 shpng-grid">
            <p>Copyright &copy; Casa Varcheli 2016</p>
        </div>
        <div class="col-md-8">
            
        </div>
    </div>		 
</div>
    <!--- se importa librería de scripts para funcinalidad de la página, cuidado si se modifica el archivo raíz. ------>
    <script src="js/scriptsGrales.js" type="text/javascript"></script>
    <!----------------------------------------------------------------------------------------------------------------->
</body>
</html>
