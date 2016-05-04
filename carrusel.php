<?php
/*****************************************
*   Se colocan las cookies necesarias para la contabilización
*   visitas y clicks en la página. 
*   #Así mismo la cookie que controla el carrusel y no se muestre de nuevo
*   hasta que el usuario cierre navegador y entre de nuevo, o bien pasen
*   12 horas. 
******************************************/
    include('php/conexion.php');
    setcookie("carrusel", "carrusel");
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('modulos/etiqueta_head.php'); ?>
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

    <?php include('modulos/menu.php'); 
    ?>
<!---------------------------------------------CARRUSEL-------------------------------------------------------------------->
    <div id="myCarousel" class="container">
		<div class="row">
        	<div class="">
                <div id='demo'>
                <div><a href='#'><img src="images/carrusel/c1.jpg"></a></div>
                <div><a href='#'><img src="images/carrusel/c2.jpg"></a></div>
                <div><a href='#'><img src="images/carrusel/c3.jpg"></a></div>
                <div><a href='#'><img src="images/carrusel/c4.jpg"></a></div>
                <div><a href='#'><img src="images/carrusel/c5.jpg"></a></div>
                </div>
            </div>
        </div>
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
            <a href="contacto.php" class="test" data-toggle="tooltip" data-placement="top" title="Visítanos en la siguiente dirección"><span class="glyphicon glyphicon-search"></span>Click aquí para mostrar mapa.</a><p>Copyright &copy; Casa Varcheli 2016</p>
        </div>
        <div class="col-xs-6 col-md-4 shpng-grid">
            <h3>Siguenos por Facebook</h3>
            <br/>
            <p><div class="fb-like" data-href="https://www.facebook.com/Casa-Vacheli-932894540157179/?notif_t=page_admin" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></p>
        </div>
     </div>
    </div>
<!------------------------------------------------------------------------------------------------------------------------->  
    <script>
		(function() {
		jQuery(function() {
		this.film_rolls || (this.film_rolls = []);
		this.film_rolls['demo'] = new FilmRoll({
		container: '#demo',
		height: 560
		});
		return true;
		});
		}).call(this);
    </script>
        <!----------------------------------------------------------------------------------------------------------------->
        <!--- se importa librería de scripts para funcinalidad de la página, cuidado si se modifica el archivo raíz. ------>
    <script src="js/scriptsGrales.js" type="text/javascript"></script>
    <!----------------------------------------------------------------------------------------------------------------->
</body>
</html>
