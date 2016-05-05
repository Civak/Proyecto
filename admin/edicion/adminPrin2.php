<?php
//Se inicia sesión para validar que el usuario siga siendo el mismo y no entre otro más.
    session_start();
    if(!isset($_SESSION['usuario'])){ //En caso de que no variable de sesión, redireciona.
    header("location: ../login/login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('../modulos/etiqueta_head.php'); ?>
    
<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>
</head>
<body> 
<!--header-->	
<nav class="navbar navbar-default header-bg">
  <div class="container-fluid" id="menuPri">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../../index.php" target="_blank"><span class="glyphicon glyphicon-new-window"></span> Ver sitio</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- Ventas -->
        <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ventas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="ven-nue"><a href="#" title="Registrar nota de venta"><span class="glyphicon glyphicon-ok"></span> Registrar Venta</a></li>
            <li id="buscar-btn"><a href="#" title="Buscar o eliminar nota de venta"><span class="glyphicon glyphicon-search"></span> Buscar/Eliminar Venta</a></li>
          </ul>
        </li>
        <!-- Inventario -->
        <li><a href="#"class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventario<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li id="lis-inv"><a href="#" title="Listar inventario"><span class="glyphicon glyphicon-list"></span> Listar inventario</a></li>
            <li id="imp-cod"><a href="#" title="Imprimir código de barras"><span class="glyphicon glyphicon-barcode"></span> Código de Barras</a></li>
            <li id="pdf-inv"><a href="#" title="Generar PDF de inventario"><span class="glyphicon glyphicon-list-alt"></span> Inventario en PDF</a></li>
            </ul>
        </li>
        <!-- Artículos -->
        <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Artículos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="art-nue"><a href="#" title="Registrar nuevo artículo"><span class="glyphicon glyphicon-ok"></span> Nuevo</a></li>
            <li id="art-edi"><a href="#" title="Editar artículo"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
            <li id="art-eli"><a href="#" title="Eliminar artículos"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li id="art-bus"><a href="#" title="Buscar artículos"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>
          </ul>
        </li>
        <!-- Estadisticas -->
        <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estadísticas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="est-vis"><a href="#" title="Ver visitas por sección"><span class="glyphicon glyphicon-stats"></span> Visitas</a></li>
            <li id="est-art"><a href="#" title="Ver artículos más vistos"><span class="glyphicon glyphicon-shopping-cart"></span> Artículos</a></li>
          </ul>
        </li>
        <!-- Tiendas -->
        <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiendas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="tie-act"><a href="#" title="Actualizar información de la tienda"><span class="glyphicon glyphicon-refresh"></span> Actualizar</a></li>
          </ul>
        </li>
        <!-- Edición -->
        <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Edición<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Color</a></li>
            <li><a href="#">Corte</a></li>
            <li><a href="#">Talla</a></li>
            <li><a href="#">Género</a></li>
            <li><a href="#">Tipo</a></li>
            <li id="carrusel-fot"><a href="#" title="Cambiar fotos del carrusel"><span class="glyphicon glyphicon-play"></span> Fotos de Carrusel</a></li>
            <li id="inicio-fot"><a href="#" title="Cambiar imágenes del inicio"><span class="glyphicon glyphicon-camera"></span> Fotos de Inicio</a></li>
          </ul>
        </li>
      </ul><!-- termina ul principal izquierdo -->
      

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" title="Buscar artículo" id="buscar-btn"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> Buscar</a></li>
        <li><a href="https://www.facebook.com/Casa-Varcheli-932894540157179/?ref=settings" title="Visitar Facebook" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
         <!-- Perfil -->
        <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Perfil<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="per-con"><a href="#" title="Cambiar contraseña"><span class="glyphicon glyphicon-lock"></span> Contraseña</a></li>
            <li id="per-nic"><a href="#" title="Cambiar nickname o apodo"><span class="glyphicon glyphicon-user"></span> Nickname</a></li>
            <li id="per-seg"><a href="#" title="Ver seguridad de cuenta"><span class="glyphicon glyphicon-sunglasses"></span> Seguridad</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="cerrarSesion.php" title="Cerrar sesión" style="color: #000 !important;"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- fin de header -->
<!-- inicio de bienvenida -->
<div class="container">
	<div class="row">
    	<div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
        </div>
        <div class="col-xs-6 col-md-4"></div>
    </div>
</div>
<!-- teremino de bienvenida -->

<!-----------------AQUI SE CARGAN TODAS LAS SECCIONES----->
<div class="login_sec">
	 <div class="container">
				<div class="row">
				    <div class="col-sm-1"></div>
                  <div id="areaDeEdicion" class="col-sm-10 edit-box1 login-gradient">
                      <img src="images/adm.png" class="img-responsive imgShadow"  />

                  </div>
                  <div class="col-sm-1"></div>
                </div>
    </div>
</div>

<!-- ERROR Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:1px solid #00a0dc;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ERROR</h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer" style="border-top:1px solid #00a0dc;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- SUCESS Modal -->
<div id="myModals" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:1px solid #00a0dc;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">MENSAJE DE CONFIRMACIÓN</h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer" style="border-top:1px solid #00a0dc;">
        <button type="button" class="btn btn-success" data-dismiss="modal">Continuar</button>
      </div>
    </div>

  </div>
</div>

<!--------------------------------------------------------->
 <div class="copywrite">
</div>	
    <!--- se importa librería de scripts para funcinalidad de la página, cuidado si se modifica el archivo raíz. ------>
    <script src="../js/scriptsGrales.js" type="text/javascript"></script>
    <!----------------------------------------------------------------------------------------------------------------->
</body>
</html>