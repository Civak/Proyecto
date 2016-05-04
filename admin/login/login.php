<?php
    session_start();
    if(isset($_SESSION['usuario'])){
    header("location: ../edicion/adminPrin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('../modulos/etiqueta_head.php'); ?>
</head>
<body> 
<!--header-->	

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
      <a class="navbar-brand" href="../../index.php"><span class="glyphicon glyphicon-chevron-left"></span> Regresar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.facebook.com/Casa-Varcheli-932894540157179/?ref=settings" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--header fin-->
<div class="container">
<div class="row header-logo">
	<div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="login_sec">
    <h3 class="img-responsive h3-font" >Casa Varcheli</h3>
    <p class="p-s1">Vestidos de Novia y mucho más para ese día especial.</p><hr>
    
<form role="form" id="login-form" class="login-box1 login-gradient">
  <div class="form-group">
    <h5><span class="glyphicon glyphicon-user"></span> Usuario:</h5>
    <input type="text" value="" class="form-control input-login" data-toggle="tooltip" name="usuario" data-placement="top" title="Ingresa tu nickname">
  </div>
  <div class="form-group">
<h5><span class="glyphicon glyphicon-lock"></span> Contraseña</h5>
<input type="password" value="" class="form-control input-login" data-toggle="tooltip" name="password" data-placement="top" title="Ingresa tu contraseña">
  </div>
<div class=text-right>		
        					 <button type="button" class="btn btn-c1" id="ingresar-login">Ingresar</button>	<br><br>
        					 <a href="recuperarPass.php" class="info-log" data-toggle="tooltip" data-placement="right" title="Recuperar cuenta"><span class="glyphicon glyphicon-info-sign"></span> ¿Olvídaste tu contraseña?</a>
					   </div>
</form>
    </div>
    </div>
    <div class="col-md-3"></div>
</div>
</div>	
<!---->
	
    <!--- se importa librería de scripts para funcinalidad de la página, cuidado si se modifica el archivo raíz. ------>
    <script src="../js/scriptsGrales.js" type="text/javascript"></script>
    <!----------------------------------------------------------------------------------------------------------------->
</body>
</html>