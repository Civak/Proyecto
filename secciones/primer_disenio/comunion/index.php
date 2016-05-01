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
   <div class="header-top">
    <div class="header-bottom">
	   <div class="container fondoMenu">			
           <div class="logo">
               <a href="../../index.php"><h1>Casa Varcheli</h1></a>
           </div>
           <div class="top-nav">
               <ul class="memenu skyblue">                   
                   <li class="grid"><a id="BOD" href="../bodas/index.php">Bodas</a>
						
					</li>
                   <li class="grid"><a id="XVA" href="../xv/index.php">XV Años</a>
					</li>
                   <li class="grid"><a id="PRE" href="../presentaciones/index.php">Presentaciones</a>

					</li>
					<li class="grid"><a id="COM" href="#">Comunión</a>
	
					</li>
                    <li class="grid"><a id="BAU" href="../bautizos/index.php">Bautizos</a>

					</li>
					<li class="grid"><a id="CAB" href="../caballero/index.php">Caballero</a>

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
		  <li><a href="#">Todo lo que necesitas para la Primera Comunión tienes aquí.</a></li>
		 </ol>
			<h2>Todo tu Primera Comunión</h2>			
		 <div class="col-md-9 product-model-sec">
					
				
		</div>
<!-------------------------Inicia menu lateral izquierdo------------------------------------------->	
			<div class="rsidebar span_1_of_left">
				 <section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categorias</h4>
						 <div class="tab1">
							 <ul class="place">								
								 <li class="sort">Vestidos</li>
								 <li class="by"><img src="../src/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Varios Colores</p></a>
									<a href="#"><p>Tallas (8-16)</p></a>
						     </div>
					      </div>						  
						  <div class="tab2">
							 <ul class="place">								
								 <li class="sort">Rosarios</li>
								 <li class="by"><img src="../src/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Dorado</p></a>
									<a href="#"><p>Plateado</p></a>
									<a href="#"><p>Varios Colores</p></a>
						     </div>
					      </div>
						  <div class="tab3">
							 <ul class="place">								
								 <li class="sort">Trajes</li> 
								 <li class="by"><img src="../src/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Varios Colores</p></a>
									<a href="#"><p>Tallas (2-44)</p></a>
						     </div>
					      </div>
						  <div class="tab4">
							 <ul class="place">								
								 <li class="sort">Tocados</li>
								 <li class="by"><img src="../src/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Dorado</p></a>
									<a href="#"><p>Plateado</p></a>
						     </div>
					      </div>
						  <div class="tab5">
							 <ul class="place">								
								 <li class="sort">Biblias</li>
								 <li class="by"><img src="../src/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Blanco</p></a>
									<a href="#"><p>Perla</p></a>
						     </div>
					      </div>
					      <div class="tab6">
							 <ul class="place">								
								 <li class="sort">Velas</li>
								 <li class="by"><img src="../src/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Varios Colores</p></a>
						     </div>
					      </div>
					      <div class="tab7">
							 <ul class="place">								
								 <li class="sort">Ramos</li>
								 <li class="by"><img src="../src/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">						
									<a href="#"><p>Varios Colores</p></a>
						     </div>
					      </div>
					      
<!---------------------------------------------------------------------------------------------------------->						  
						    <!--script de funciones generales de la página, como menu, clicks, etc.-->
						    <script src="../js/menuGrales.js" type="text/javascript"></script>
						    <!-- script -->					 
				 </section>

			 </div>				 
	      </div>
		</div>
</div>
<!---------- Se incluye footer, que es el mismo de todas las secciones, por eso es un modulo; en un futuro se modifica el modulo 
y afecta todas las secciones, siendo una edición rápida y fácil----------->
    <?php include('../modulos/footer_dir.php'); ?>
<!------------------------------------------------------------------------------------------------------->
</body>
</html>