	//Inicia JQuery
	/*
	Este archivo afecta a TODOS los menus laterales izquierdos de todas las secciones, 
	tener mucho cuidado si no se sabe como funciona y se desea actualizar algo. 
	*/
	$(document).ready(function(){
	$(".swipebox").swipebox({
							useCSS : true, // false will force the use of jQuery for animations
		hideBarsDelay : 0});
	//Clicks para conteo de visitas por página. 
    $("ul#top-nav").on('click', 'a', function(){
        //Esta función solo envia datos, no forms.
        var acc = $(this).attr('id');
        $.cookie("sec",acc, { path: '/' });
    });
	
	/*$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
			 });
	});*/
	/*****************************************************************
	Codigo que hace aparecer el scrollToTop cuando se está muy abajo de la pagina. 
	******************************************************************/
	$(window).scroll(function(){
		if ($(this).scrollTop() > 300) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

//Scroll infinito
	$(window).scroll(function(){
	
	var scrolling = parseInt($.cookie("accion"));
    if($(window).scrollTop() == $(document).height() - $(window).height() && scrolling >= 0 &&  scrolling != 3)
    {
		var control = parseInt($.cookie("conta")) + 9;
		$.cookie("conta", control, {path: "/"});
		$.cookie("accion", 1, {path: "/"});
		var imgP = $('#imagenPerfil').attr('src');
        $.ajax({
        	data: {"con":control},
			url: "../php/initCat.php",
			type: 'post',
			async: false, 
			beforeSend: function () {

					},
        success: function(fotos)
        {
			if(parseInt(fotos) != -1)
			{
				$("div#cat-pro").append(fotos);
			}
			else
			{
				alertify.log("Ya no hay más productos para mostrar.");
			}
        }
        });
    }
	else
	{
		console.log("no scroling");
	}
});

	//Clicks en los menus izquierdos.
	$("div#men-sub").on('click', "li",function(){
		var art = $(this).attr("id");
		var texto = $(this).text();
		
		$.cookie("art", art, {path: "/"});
		$.cookie("conta", 0, {path: "/"});
		$.cookie("accion", 0, {path: "/"});
        $.ajax({
        	data: {"art":art},
			url: "../php/initCat.php",
			type: 'post',
			async: false, 
			beforeSend: function () {

					},
			success: function(fotos)
			{
				if(parseInt(fotos) == -1){
					alertify.log("Ups... no hay artículos aún.");
				}
				else{
				$("h2#encabezado").hide();
				$("h2#encabezado").find("span#articulo").html(": <span style='color: #BFAC9B;'>&laquo; "+texto+"</span>");
				$("h2#encabezado").fadeIn(1200);
				$("div#cat-pro").hide();
				$("div#cat-pro").html(fotos);
				$("div#cat-pro").fadeIn(1500);
				}
			}
        });
	});
	
	$("div#cat-pro").on('click', "a",function(){
		var codbar = $(this).attr("id");
		$("div#myModal .modal-title").html("<b>Código:</b> <span style='color: #662735;'>"+codbar+"</span>");
		$.cookie("accion", 2, {path: "/"});
		$.ajax({
        	data: {"cod":codbar},
			url: "../php/initCat.php",
			type: 'post',
			async: false, 
			beforeSend: function () {

					},
			success: function(fotos)
			{
				if(parseInt(fotos) == -1){
					alertify.error("Ups... ocurrió un error, intenta nuevamente.");
				}
				else{
				$("div#myModal .modal-body").html(fotos);	
				$("#myModal").modal();
				//$('.test-popup-link').magnificPopup({type:'image'});
				}
			}
        });
		
	});
	
	//Click en boton buscar de barra superior.
	$("ul#barraBusqueda").on("click","a#buscar-btn", function(e){
			e.preventDefault();	   
			alertify.set({ labels: {
				ok     : "Buscar",
				cancel : "Cancelar"
			} });
			
			alertify.prompt("Buscar por palabra clave (máximo 4 palabras)", function (e, str) {
				// str is the input text
				if (e) {
					buscarProducto(str);
				} else {
					alertify.log("Has cancelado búsqueda");
				}
			}, "");
		});
	//Funcion que busca por palabra
	function buscarProducto(str){
			var palabra = str;	
			palabra = $.trim(palabra);
			
			if(palabra != ''){
			$.cookie("accion", 3, {path: "/"});
			$.cookie("busqueda", palabra, {path: "/"});
			$.ajax({
        	data: {"cont": 0},
			url: "../php/initCat.php",
			type: 'post',
			async: false, 
			beforeSend: function () {

					},
			success: function(fotos)
			{
				if(parseInt(fotos) == -1){
					alertify.log("No hay artículos encontrados.");
				}
				else{
				/*$("h2#encabezado").hide();
				$("h2#encabezado").find("span#articulo").html("<span style='color: #00a0dc;'>&laquo; Resultado de Búsqueda</span>");
				$("h2#encabezado").fadeIn(1200);*/
				$("div#cat-pro").hide();
				$("div#cat-pro").html(fotos);
				$("div#cat-pro").fadeIn(1500);
				}
			}
        	});
			}
			else 
			{
				alertify.log("Escribe una palabra clave para buscar artículos.");
			}
	};
	
	//Click en boton mostrar más de resultado de busqueda
	$("div#cat-pro").on("click","button#mas-art", function(){
			var contador = $(this).val();	
			
			$.cookie("accion", 3, {path: "/"});
			$.ajax({
        	data: {"cont":contador},
			url: "../php/initCat.php",
			type: 'post',
			async: false, 
			beforeSend: function () {

					},
			success: function(fotos)
			{
				if(parseInt(fotos) == -1){
					alertify.log("No hay mas resultados.");
				}
				else{
				$("div#cat-pro").find("div#mostrar-mas").prepend(fotos);
				contador = parseInt(contador) + 9;
				$("div#cat-pro").find("button#mas-art").val(contador);
				}
			}
        	});

		});

});