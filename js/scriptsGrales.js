//Se inicializa JQuery 
$(document).ready(function(){
    //Línea que sirve para todos los tooltip aparezcan.
    $('[data-toggle="tooltip"]').tooltip(); 
    
    //Clicks para conteo de visitas por página. 
    $("ul#top-nav").on('click', 'a', function(){
        //Esta función solo envia datos, no forms.
        var acc = $(this).attr('id');
		console.log(acc);
        //var formData = new FormData($("div.login_sec form")[0]);
        $.cookie("sec",acc, {path: "/"});
            $.ajax({
                data: {"cod":dato}, 
                url: archivo,
                type: 'post',
                async: false, 
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                }
            });
    });
	
	$("div#fotos-p").on('click', 'a', function(){
		var acc = $(this).attr('id');
        $.cookie("sec",acc, {path: "/"});
	});
	
	$("div#XVA, div#BOD").on('click', function(){
		var acc = $(this).attr('id');
		window.open("secciones/apartados/index.php", "_self");
        $.cookie("sec",acc, {path: "/"});
	});
});