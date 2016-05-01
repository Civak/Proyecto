<?php
include('../../php/objetos_RegClicks.php');
?>
<!DOCTYPE html>
<html>
<head>
    <!------ Se incluye todas las lineas de la equiteta head, ya que se repiten en todas las secciones ---->
    <?php include('../modulos/etiqueta_head.php'); ?>
    <!----------------------------------------------------------------------------------------------------->
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
    <?php include('../modulos/menu_single.php'); ?>
<!--header-->


<!------- FIN AREA DE dropdown E inicio de confirmacion-------------------------------------------->
<hr style="border-color: #BBB;">
<!------------------------------------------------------------------------->
<div class="single-sec">
	 <div class="container">
		 <hr>
		 <!-- start content -->	
		 <div class="col-md-9 det">
				 <div class="single_left">
					 <div class="flexslider">
							<ul class="slides">
								<li data-thumb="images/s11.jpeg">
									<img src="images/s11.jpeg" />
								</li>
								<li data-thumb="images/s22.jpeg">
									<img src="images/s22.jpeg" />
								</li>
								<li data-thumb="images/s33.jpeg">
									<img src="images/s33.jpeg" />
								</li>
								<li data-thumb="images/s44.jpeg">
									<img src="images/s44.jpeg" />
								</li>
							</ul>
						</div>

				 </div>
				  <div class="single-right">

					  <div class="single-bottom1">
						<h6>Detalles</h6><br>
						<div class="id"><h4>Código: SB2379AAABBBCCC</h4></div><hr>
						<p class="prod-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam. Ut wisi enim ad minim veniam iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
					 </div>					 
				  </div>
				  <div class="clearfix"></div>
		  <!---->
			 
			<!---->
		    </div>

        	 <div class="rsidebar span_1_of_left">
			     <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
			     Aqui se imprimiría el mismo menú de la sección del producto mediante PHP. 
			 </div>
			        <!--script de funciones generales de la página, como menu, clicks, etc.-->
						    <script src="../js/menuGrales.js" type="text/javascript"></script>
					<!-- script -->	
		     <div class="clearfix"></div>
	  </div>	 
</div>

<!---------- Se incluye footer, que es el mismo de todas las secciones, por eso es un modulo; en un futuro se modifica el modulo 
y afecta todas las secciones, siendo una edición rápida y fácil----------->
    <?php 
    include('../modulos/librerias_footerJS.php');
    include('../modulos/footer_dir.php');
    ?>
<!------------------------------------------------------------------------------------------------------->
</body>
</html>