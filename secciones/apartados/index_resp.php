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
    <?php include('../modulos/header.php'); ?>
<!------------------------------------------------------------------------->
   <div class="header-top">
    <div class="header-bottom">
	   <div class="container fondoMenu">			
           <div class="logo">
               <a href="../../index_resp.php"><h1>Casa Varcheli</h1></a>
           </div>
           <div class="top-nav">
               <ul class="memenu skyblue">                   
                   <li class="grid"><a id="BOD" href=".">Bodas</a>
						
					</li>
                   <li class="grid"><a id="XVA" href=".">XV Años</a>
					</li>
                   <li class="grid"><a id="PRE" href=".">Presentaciones</a>

					</li>
					<li class="grid"><a id="COM" href=".">Comunión</a>
	
					</li>
                    <li class="grid"><a id="BAU" href=".">Bautizos</a>

					</li>
					<li class="grid"><a id="CAB" href=".">Caballero</a>

					</li>
               </ul>
               <div class="clearfix"> </div>
           </div>
           <div class="clearfix"> </div>
			 <!---->			 
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!---->
<!--header//-->
<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="#">Todo lo que necesitas para ese día especial lo tienes en Casa Varcheli</a></li>
		 </ol>
			<h2 id="encabezado">
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
            <span id="articulo"></span></h2>			
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
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Todo sobre Bodas</h4>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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