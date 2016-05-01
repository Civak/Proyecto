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
    <?php include('modulos/menu.php'); ?>
<!------------------------------------------------------------------------->
<ol class="breadcrumb">
		  <li><span class="glyphicon glyphicon-time"></span> En esta dirección puedes encontrarnos, en horario de <b>9:00 - 14:00 hras y 16:00 - 20:00 hras.</b></li>
		 </ol>
    <hr>
<!------------------------------------------------------------------------->
<div class="bride-grids">
	 <div class="container">
     <div class="row">
		<div class="col-xs-6 col-md-4">
         </div>
        <div class="col-xs-6 col-md-4">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.3023246447488!2d-101.19236388529204!3d19.6997487867331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842d0e715666c0f9%3A0xa68002f33a26d383!2sLic.+Soto+Salda%C3%B1a+142%2C+Centro+Hist%C3%B3rico%2C+58000+Morelia%2C+Mich.!5e0!3m2!1ses-419!2smx!4v1458843201696" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe
		></div>
		<div class="col-xs-6 col-md-4">
        </div>
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
            <h3>Siguenos por Facebook</h3>
            <br/>
            <div class="fb-like" data-href="https://www.facebook.com/Casa-Vacheli-932894540157179/?notif_t=page_admin" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        </div>
        <div class="col-xs-6 col-md-4 shpng-grid">
            
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
