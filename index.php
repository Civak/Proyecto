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
<?php include('modulos/menu.php'); ?>
<!------------------------------------------------------------------------------------------------------------------------->
<div class="container">
<div class="row header-logo">
	<div class="col-md-3"></div>
    <div class="col-md-6"><h3 class="img-responsive h3-font" >Casa Varcheli</h3>
    <p class="p-s1">Vestidos de Novia y mucho más para ese día especial.</p>
    </div>
    <div class="col-md-3"></div>
</div>
</div>
<hr>

<!------------------------------------------------------------------------------------------------------------------------->
<div class="container" id="fotos-p">
	<div class="row">
    <div class="col-xs-6">
    <a href="secciones/apartados/index.php" id="BOD">
    	<div class="img-shadow">
   		<img id="demo1" src="images/inicio/img1.jpg" class="img-responsive img-shadow" />
        <div class="contenthover">
        Todo sobre Bodas
        </div>
    </a>
        </div>
    </div>
    	<div class="col-xs-6">
		<a href="secciones/apartados/index.php" id="XVA">
        <div class="img-shadow">
          <img id="demo2" src="images/inicio/img2.jpg" class="img-responsive img-shadow" />
          <div class="contenthover">
          Todo sobre XV años
          </div>
          </a>
          </div>
        </div>
    </div>
</div>

<hr>
<div class="container">
<div class="row header-logo">
<div class="breadcrumb breadcrumb-s1 img-shadow2">
    <div class="row">
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4 text-center"><p class="p-s2">Vestidos de Novia, XV años, Comuniones, Presentaciones y Caballero.</p></div>
        <div class="col-xs-6 col-md-4"></div>
	</div>
</div>
	<div class="col-xs-6 col-md-4">
    		<img id="demo2" src="images/a1.png" class="img-responsive img-shadow" />
    </div>
    <div class="col-xs-6 col-md-4">
    		<img id="demo2" src="images/a2.png" class="img-responsive img-shadow" />
    </div>
    <div class="col-xs-6 col-md-4">
    		<img id="demo2" src="images/a3.png" class="img-responsive img-shadow" />
    </div>
</div>

</div>
<hr>
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
$(document).ready(function(){
$('#demo1').contenthover({
overlay_background:'#D6C4B1',
overlay_width: 0,               // The overlay element's width. Set to 0 to use the same as 'width'
overlay_height: 50,
overlay_opacity:0.7,
effect: 'slide',
slide_speed: 400,         
slide_direction: 'bottom'
});

$('#demo2').contenthover({
overlay_background:'#D6C4B1',
overlay_width: 0,               // The overlay element's width. Set to 0 to use the same as 'width'
overlay_height: 50,
overlay_opacity:0.7,
effect: 'slide',
slide_speed: 400,         
slide_direction: 'bottom'
});
});
</script>
    <!--- se importa librería de scripts para funcinalidad de la página, cuidado si se modifica el archivo raíz. ------>
    <script src="js/scriptsGrales.js" type="text/javascript"></script>
    <!----------------------------------------------------------------------------------------------------------------->
</body>
</html>
