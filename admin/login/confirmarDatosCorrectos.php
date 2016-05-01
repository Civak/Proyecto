<!DOCTYPE html>
<html>
<head>
    <?php include('../modulos/etiqueta_head.php'); ?>
</head>
<body> 
<!--header-->	
		 <div class="container">
         	<div class="row">	
            <div class="col-xs-6 col-md-4"></div>
            	<div class="col-xs-6 col-md-4">	
                <p style="padding-top:20%;">
				<div class="logo">
					<h3>Se redirecionará en 5 segundos.</h3>
				</div>
                </p>
                </div>	
            <div class="col-xs-6 col-md-4"></div>
            </div>
		 </div>
<script>
    $(document).ready(function(){
        var contador = 5; 
        var redirecciona = "login.php"; //Aqui iria area administrativa.
        setInterval( function() {
        contador--;
        $('.logo').html("<h3>Se redirecionará en "+contador+" segundos.</h3>");
        
        if (contador === 0) {
            $("body").fadeOut(1000,function(){
            $(location).attr('href',redirecciona);
            });
        }    

    }, 1000 );
    });
</script>

</body>
</html>