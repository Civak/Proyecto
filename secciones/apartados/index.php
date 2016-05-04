<?php
if(!isset($_COOKIE['sec']) || strcmp($_COOKIE['sec'], "CAR") === 0)
{
	setcookie("sec", "BOD", time() + (3600 * 8), "/");
}
include('../../php/objetos_RegClicks.php');
?>
<!DOCTYPE html>
<html>
<head>
    <!------ Se incluye todas las lineas de la equiteta head, ya que se repiten en todas las secciones ---->
    <?php include('../modulos/etiqueta_head.php'); ?>
    <!----------------------------------------------------------------------------------------------------->
    <script type="text/javascript">
    $.cookie("accion", -1, {path: "/"});
    </script>
    
    <style type="text/css">
    #gallery_01 img{border:2px solid white;} /*Change the colour*/ 
	.active img{border:2px solid #333 !important;} 
    </style>
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
<!------------------------------------------------------------------------->
<nav class="navbar navbar-default header-bg">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand h3-font-2" href="../../index.php">Casa Varcheli</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="top-nav">
        			<li>
                      <a id="BOD" href=".">Bodas</a>
                    </li>
                    <li><a id="XVA" href=".">XV años</a></li>
                    <li><a id="BAU" href=".">Bautizos</a></li>
                    <li><a id="COM" href=".">Comunión</a></li>
                    <li><a id="PRE" href=".">Presentaciones</a></li>
                    <li><a id="CAB" href=".">Caballero</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right" id="barraBusqueda">
      	<li><a href="#" id="buscar-btn"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> Buscar</a></li>
        <li><a href="https://www.facebook.com/Casa-Varcheli-932894540157179/?ref=settings" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
        <li>
          <a href="../../admin/login/login.php"><i class="glyphicon glyphicon-log-in"></i> Ingresar</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!---->
<!--header//-->
<div class="product-model">	 
	 <div class="container">
			<h2 id="encabezado" class="h3-font-3">
            <?php
				switch($_COOKIE['sec'])
				{
					case "BOD": echo "Bodas"; break;
					case "BAU": echo "Bautizos"; break;
					case "XVA": echo "XV Años"; break;
					case "PRE": echo "Presentaciones"; break;
					case "COM": echo "Primera Comunión"; break;
					case "CAB": echo "Caballero"; break;
				}
			?>
            <span id="articulo"></span></h2><hr style="border-color: lightgray; border-style:dashed">		
		 <div class="col-md-9 product-model-sec" id="catalogo">
					<div id="cat-pro">
					 
                     		<?php
							include("../php/claseSecciones.php");
                            $menu = new Catalogos();
                            $menu->randomCat();
                            ?>
                     </div>
		</div>
<!-------------------------Inicia menu lateral izquierdo------------------------------------------->	

			<div class="rsidebar span_1_of_left">
				 <section  class="sky-form">
					 <div class="product_right" id="men-sub">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Artículos & Accesorios</h4>
						    <?php
                            /*****************************************
                            * Creación de objetos para crear menus de secciones
                            ******************************************/
                            $menu = new Conexiones();
                            $menu->crearMenu($_COOKIE['sec']);
                            ?>
<!---------------------------------------------------------------------------------------------------------->						  
						    				 
				 </section>

			 </div>				 
	      </div>
	      
	      
		</div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade modal-text" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content modal-gradient">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-c1" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!--script de funciones generales de la página, como menu, clicks, etc.-->
						    <script src="../js/menuGrales.js" type="text/javascript"></script>
						    <!-- script -->	
<!---------- Se incluye footer, que es el mismo de todas las secciones, por eso es un modulo; en un futuro se modifica el modulo 
y afecta todas las secciones, siendo una edición rápida y fácil----------->
    <?php include('../modulos/footer_dir.php'); ?>
<!------------------------------------------------------------------------------------------------------->
</body>
</html>