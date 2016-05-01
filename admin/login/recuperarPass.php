<!DOCTYPE html>
<html>
<head>
    
<?php include('../modulos/etiqueta_head.php'); ?>

<!-------------------- coloca cookies alatearias ---------------------------------->
    <script type="text/JavaScript">
        $(document).ready(function(){
            //Crea valor num1 
            var num1 = Math.floor((Math.random() * 10) + 1);
            $.cookie("num1", num1);
            
            //Crea valor num2 
            var num2 = Math.floor((Math.random() * 10) + 1);
            $.cookie("num2", num2);
            
            //Coloca el valor de las cookies sin leerlas.
            $("span#num1").text(num1);
            $("span#num2").text(num2);
        });
    </script>
<!-------------------- /coloca cookies alatearias ---------------------------------->
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
      <a class="navbar-brand" href="login.php"><span class="glyphicon glyphicon-chevron-left"></span> Regresar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav" id="top-nav">
        			<li >
                      <a  id="BOD" href="../../index.php" ><span class="glyphicon glyphicon-home"></span> Inicio</a>
                    </li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.facebook.com/profile.php?id=100011635297468&fref=ts" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
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
    
<form role="form" id="RecuperarForm" class="login-box1 login-gradient">
  <div class="form-group">
    <h5><span class="glyphicon glyphicon-user"></span> Usuario:</h5>
    <input type="text" value="" class="form-control input-login" id="nickname" name="nickname" value="" data-toggle="tooltip" data-placement="top" title="Distingue entre mayúsculas y minúsculas">
  </div>
  <div class="form-group">
<h5><span class="glyphicon glyphicon-question-sign"></span> Respuesta de recuperación</h5>
<input type="text" value="" class="form-control input-login" id="pregunta" name="pregunta" value=""  data-toggle="tooltip" data-placement="top" title="Ingresa la respuesta de tu pregunta de seguridad al crear tu cuenta">
  </div>

<div class="row">
	<div class="col-xs-6 col-sm-4 text-center">
    		<h5 style="color: darkred;">Pregunta de seguridad:</h5>
					 <b><span id="num1"></span> + <span id="num2"></span></b><br>
                     <input type="text" id="SumaSeg" value=""  style="border: 1px solid gray;  width: 60% !important;" data-toggle="tooltip" data-placement="top" title="¿Cuánto suman los números?">
    </div>
    <div class="col-xs-6 col-sm-4"></div>
    <div class="col-xs-6 col-sm-4">
		<button type="button" class="btn btn-c1" id="Recuperar">Recuperar</button>
    </div>
</div>
			 
</form>
    </div>
    </div>
    <div class="col-md-3"></div>
</div>
</div>	
<!---->
<!-- Modal -->
<div id="myModal-pwd" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmar contraseña nueva.</h4>
        <span style="font-size: 12px; color: darkred;">(Tienes 10 minutos para cambiar contraseña y recuperar cuenta)</span>
      </div>
      <div class="modal-body">
        <p>
            <div class="row">
            <form id="recuperar-pwd">
            <div class="col-xs-6 col-md-4"></div>
            <div class="col-xs-6 col-md-4 text-center">
            <div class="form-group" style="margin: 0 auto;">
              <label for="pwd"><b class="infoObligatoria">Nueva contraseña:</b></label>
              <input type="password" class="form-control" id="pwd" name="pwd">
            </div><br>
            <div class="form-group">
              <label for="pwd2"><b class="infoObligatoria">Repite nueva contraseña:</b></label>
              <input type="password" class="form-control" id="pwd2" name="pwd2">
            </div>
            </div>
            <div class="col-xs-6 col-md-4"></div>
            </div>
                     <div class="text-right">
					     <input type="button" class="btn btn-success" value="Confirmar" id="Conf-pwd">
					 </div>
            </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>
    <!--- se importa librería de scripts para funcinalidad de la página, cuidado si se modifica el archivo raíz. ------>
    <script src="../js/scriptsGrales.js" type="text/javascript"></script>
    <!----------------------------------------------------------------------------------------------------------------->
<script>
    $(document).ready(function(event){
        $( "form#RecuperarForm" ).on("click", "button#Recuperar", function( event ) {
        var n1 = $.cookie("num1");
        var n2 = $.cookie("num2");
        
        //Estas siguientes lineas deben ser evaluadas en el if, que no estén vacias solamente.
        var nick = $("input#nickname").val();
        var preg = $("input#pregunta").val();
        
        if(nick != '' && pregunta != '')
        {
            if((parseInt(n1) + parseInt(n2)) === parseInt($("input#SumaSeg").val()))
                {
                    enviarForm("../../php/objetos_Login.php", 1, "form#RecuperarForm"); 
                }
                else
                {
                    alertify.error("La pregunta de seguridad no es correcta.");
                }
        }
        else
        {
            alertify.error("Algún campo está vacio, verifica.");
        }
        
    });
    //-------------------------------------------------------------------------------
    $( "div#myModal-pwd" ).on("click", "input#Conf-pwd", function( event ) {
        //Estas siguientes lineas deben ser evaluadas en el if, que no estén vacias solamente.
        var pwd1 = $( "form#recuperar-pwd" ).find("input#pwd").val();
        var pwd2 = $( "form#recuperar-pwd" ).find("input#pwd2").val();
        if(pwd1 != '' && pwd2 != '')
        {
            if(pwd1.length >= 6 && pwd1.length <= 34)
                {
                    if(pwd1.localeCompare(pwd2) == 0)
                    {
                        $('#myModal-pwd').modal('hide');
                        enviarForm("../../php/objetos_Login.php", 2, "form#recuperar-pwd"); 
                        
                    }
                    else 
                    {
                        alertify.error("Las contraseñas no son iguales, verifica.");
                    }
                    
                }
                else
                {
                   alertify.error("La contraseña debe ser mayor de 6 y menor de 34 caracteres.");
                }
        }
        else
        {
            alertify.error("Algún campo está vacio, verifica.");
        }
        
    });
    
    //----------------------------------------------------------------------------------------
    function enviarForm(archivo, acc, area)
    {

        var date = new Date(); //Obtengo tiempo de expiración, 10 min. 
        date.setTime(date.getTime() + (10 * 60 * 1000));
        
        var formData = new FormData($(area)[0]);
        $.cookie("accion",acc, {expires: date, path: "/"});
        $.ajax({
          url: archivo,
          type: 'POST',
          data: formData,
          async: false,
          cache: false,
          contentType: false,
          processData: false,
          success: function (infoRegreso) {
             
             switch(parseInt(infoRegreso))
             {
                 case 1:
                     $('#myModal-pwd').modal();
                     break;
                     
                     case 2:
                         $("body").fadeOut(400, function(){
                             $(location).attr("href", 'confirmarDatosCorrectos.php');
                         });
                         break;
                         
                         default:
                         alertify.error(infoRegreso);
             }
             
          },
          error: function () {
              alertify.error("Ha ocurrido un error, intenta nuevamente.");
          }
      });
    }
});
</script>
</body>
</html>