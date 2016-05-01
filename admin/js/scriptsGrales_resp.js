//Se inicializa JQuery 
$(document).ready(function(){
    //Línea que sirve para todos los tooltip aparezcan, al inicio fue un plugin de Bootstrap para tooltip, actualmente lo que crea los tooltip
    //Es Jquery UI, NO Bootstrap, ver documentación. 
    $('[data-toggle="tooltip"]').tooltip({
        tooltipClass: "toolJQui",
        hide: { effect: "blind", duration: 200 },
        show: { effect: "slide", duration: 400 },
        });
    
  /*Estas lineas son interesantes, en algún momento serviran. xD 
  $(document).on('DOMNodeInserted','div.login_sec', function(e) {
       $('[data-toggle="tooltip"]').tooltip();
    });*/
    
    /********************************************************************************
    ## COMIENZAN LAS FUNCIONES PARA DETECTAR LOS BOTONES DEL -MENU DE OPCIONES- PRINCIPAL
    *********************************************************************************/
    $("ul.nav-pills").on("click","li", function(){
        console.log("si");
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").html('<img src="images/adm.png" class="img-responsive imgShadow"  />');
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(1500);
    });
    
    /********************************************************************************
    ## COMIENZAN LAS FUNCIONES PARA DETECTAR LOS BOTONES DE LOS DISTINTOS MENUS O SECCIONES
    *********************************************************************************/
    //Estas funciones solamente son para la sección articulos. 
    /******** click en boton nuevo *****/
    $("div#menu1").on("click", "button#art-nue", function(){
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").load("articulos/previewCarga.php");
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(2000);
    });
    /******** click en boton buscar *****/
    $("div#menu1").on("click", "button#art-bus", function(){
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").load("articulos/buscar.php");
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(2000);
    });
    /******** click en boton editar *****/
    $("div#menu1").on("click", "button#art-edi", function(){
        fadeInOut("articulos/articulos.php");
            alertify.set({ labels: {
                    ok     : "OK",
                    cancel : "Cancelar"
                } });
            alertify.prompt("Escribe el Código de Barrara del artículo para editar..", function (e, str) {
                   
                    if (e) {
                       str = str.toUpperCase();
                    if(validarEliminar(str)) validarForm('articulos/php/initArt.php', str, 1);
                    else alertify.error("El codigo de barras no es válido.");
                    } else {
                       alertify.error("Edición cancelada.");
                    }
                }, "");
        });
    /******** click en boton eliminar *****/
    $("div#menu1").on("click", "button#art-eli", function(){
        fadeInOut("articulos/articulos.php");
        alertify.set({ labels: {
                ok     : "OK",
                cancel : "Cancelar"
            } });
        alertify.prompt("Escribe el Código de Barras del artículo para eliminar.", function (e, str) {
               
                if (e) {
                    str = str.toUpperCase();
                    if(validarEliminar(str)) enviarDatosBuscar('articulos/php/initArt.php', str, 5);
                    else alertify.error("El codigo de barras no es válido.");
                } else {
                   alertify.error("Eliminación cancelada.");
                }
            }, "");
    });
    //Estas funciones solamente son para la sección ventas. 
    $("div#menu2").on("click", "button#vent-nue", function(){
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").load("ventas/ventas.php");
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(2000);
    });
     /********************************************************************************
    ## FINALIZA LAS FUNCIONES PARA DETECTAR LOS BOTONES DE LOS DISTINTOS MENUS O SECCIONES
    *********************************************************************************/
    
    /******** click en boton confirmar de articulo nuevo *****/
    $("div.login_sec").on("click", "button#confirmar-art", function(event){
        //Orden de parametros: 
        //archivo que procesa la info, mensaje de error, tipo de objeto que se creara (ver archivo del primer parametro), área html donde se lee info.
        validarForm('articulos/php/initArt.php', 'Algún campo está vacio, por favor verifica nuevamente.', 0, "div.login_sec form", "nvoArt", "articulos/previewCarga.php");
    });
    
    //Estas funciones solamente son para la sección. 
    /******** click en boton actualizar de seccion tienda *****/
    $("div#menu6").on("click", "button#tie-act", function(){
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").load("tiendas/tiendas.php");
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(2000);
    });
    
    /******** click en boton contraseña de seccion perfil *****/
    $("div#menu5").on("click", "button#per-con", function(){
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").load("perfil/contrasenia.php");
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(1200);
    });
    
    /******** click en boton cambiar nick de seccion perfil *****/
    $("div#menu5").on("click", "button#per-nic", function(){
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").load("perfil/nick.php");
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(1200);
    });
    
    /******** click en boton cambiar nick de seccion perfil *****/
    $("div#menu5").on("click", "button#per-seg", function(){
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").load("perfil/seguridad.php");
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(1200);
    });
    
    /******** click en boton de estadisticas para visitas nick de seccion perfil *****/
    $("div#menu4").on("click", "button#est-vis", function(){
        $("div.login_sec").find("div#areaDeEdicion").hide();
        $("div.login_sec").find("div#areaDeEdicion").load("estadisticas/estadisticas.php");
        $("div.login_sec").find("div#areaDeEdicion").fadeIn(1200);
    });
    
    //----------- click en botón confirmar cambio de contraseña. verifica campos
    $("div.login_sec").on("click", "button#confi-pwd-cam", function(event){
        var area = "div.login_sec form#c-password";
        var inputsname = [];
        var inputs = [];
        var vacios = false;
      $(area).find('input, textarea, select').each(function(){
            inputs.push($(this).val());
            inputsname.push($(this).attr('name'));
        });
        
        for(var i = 0; i < inputs.length; i++)
        {
            if(inputs[i] == '')
            {
                vacios = true;
            }
        }
        
        if(vacios === true)
        {
            alertify.error("Algún campo está vacio, verifica por favor.");
        }
        else
        {
            //Ahora se verifica si el nvo pass es igual, posteriormente si son mínimo 6 caracteres.
            if(inputs[1].localeCompare(inputs[2]) == 0)
            {
                if(inputs[1].length >= 6 && inputs[1].length <= 34)
                {
                    //Se envian los datos serializados. 
                    enviarForms('perfil/php/initPer.php', 0, area);
                    $("div.login_sec form#c-password").find("input#"+inputsname[0]).val('');
                    $("div.login_sec form#c-password").find("input#"+inputsname[1]).val('');
                    $("div.login_sec form#c-password").find("input#"+inputsname[2]).val('');
                }
                else 
                {
                    alertify.error("La contraseña debe tener una longitud mínima de 6 y máxima de 34 caracteres.");
                }
            }
            else {
                alertify.error("Las nuevas contraseñas no son iguales, verifica por favor.");
            }
        }
    });
    
    //----------- click en botón confirmar cambio de nick. verifica campos
    $("div.login_sec").on("click", "button#confi-nick-cam", function(event){
        var area = "div.login_sec form#c-nick";
        var inputsname = [];
        var inputs = [];
        var vacios = false;
      $(area).find('input, textarea, select').each(function(){
            inputs.push($(this).val());
            inputsname.push($(this).attr('name'));
        });
        
        for(var i = 0; i < inputs.length; i++)
        {
            if(inputs[i] == '')
            {
                vacios = true;
            }
        }
        
        if(vacios === true)
        {
            alertify.error("Algún campo está vacio, verifica por favor.");
        }
        else
        {
                    //Se envian los datos serializados. 
                    enviarForms('perfil/php/initPer.php', 1, area);
                    $(area).find("input#"+inputsname[0]).val('');
                    $(area).find("input#"+inputsname[1]).val('');
        }
    });
    
    //----------- click en botón confirmar ver estadisticas de visitas. verifica campos
    $("div.login_sec").on("click", "button#ver-vis", function(event){
        var area = "div.login_sec form#est-visitas";
        var inputsname = [];
        var inputs = [];
        var vacios = false;
      $(area).find('input, textarea, select').each(function(){
            inputs.push($(this).val());
            inputsname.push($(this).attr('name'));
        });
        
        for(var i = 0; i < inputs.length; i++)
        {
            if(inputs[i] == '')
            {
                vacios = true;
            }
        }
        
        if(vacios === true)
        {
            alertify.error("Algún campo está vacio, verifica por favor.");
        }
        else
        {
                    //Se envian los datos. 
                    enviarFormEstadisticas('estadisticas/php/initEst.php', 0, area);
                    console.log($(area).find("input#"+inputsname[0]).val());
                    $(area).find("input#"+inputsname[0]).val('');
                    $(area).find("input#"+inputsname[1]).val('');
        }
    });
    
	//----------- click en botón confirmar ver estadisticas de articulos. verifica campos
    $("div#menu4").on("click", "button#est-art", function(event){
		var date = new Date(); //Obtengo tiempo de expiración, 10 min. 
        date.setTime(date.getTime() + (10 * 60 * 1000));
        
        //var formData = new FormData($("div.login_sec form")[0]);
        $.cookie("accion",1, {expires: date, path: "/"});
            $.ajax({
                data: {"cod":0}, 
                url: 'estadisticas/php/initEst.php',
                type: 'post',
                async: false, //importantisimo, toma la variable al vuelo.
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                 if($.isNumeric(infoRegreso))
              {
                  alertify.error("Ocurrió un error, intenta de nuevo.");
              }
              else
              {
                  alertify.alert(infoRegreso);
              }
                },
                  error: function () {
                     alertify.error("Ocurrió un error, intenta de nuevo.");
                  }
            });									  
		});
    //----------- click en botón generar pdf visitas. verifica campos
    $("div.login_sec").on("click", "button#gen-pdf", function(event){
        var area = "div.login_sec form#est-visitas";
        var inputsname = [];
        var inputs = [];
        var vacios = false;
      $(area).find('input, textarea, select').each(function(){
            inputs.push($(this).val());
            inputsname.push($(this).attr('name'));
        });
        
        for(var i = 0; i < inputs.length; i++)
        {
            if(inputs[i] == '')
            {
                vacios = true;
            }
        }
        
        if(vacios === true)
        {
            alertify.error("Algún campo está vacio, verifica por favor.");
        }
        else
        {
                    //Se envian los datos serializados. 
                    var date = new Date(); //Obtengo tiempo de expiración, 10 min. 
                    date.setTime(date.getTime() + (10 * 60 * 1000));
                    var fechas = $(area).find("input#"+inputsname[0]).val()+";"+$(area).find("input#"+inputsname[1]).val();
                    
                    $.cookie("fechas",fechas, {expires: date});
                    $(area).find("input#"+inputsname[0]).val('');
                    $(area).find("input#"+inputsname[1]).val('');
                    
                    window.open('estadisticas/pdf/estpdf.php', '_blank'); 
        }
        
    });
    
    //----------- click en botón confirmar cambio de seguridad. verifica campos
    $("div.login_sec").on("click", "button#confi-seg-cam", function(event){
        var area = "div.login_sec form#c-seguridad";
        var inputsname = [];
        var inputs = [];
        var vacios = false;
      $(area).find('input, textarea, select').each(function(){
            inputs.push($(this).val());
            inputsname.push($(this).attr('name'));
        });
        
        for(var i = 0; i < inputs.length; i++)
        {
            if(inputs[i] == '')
            {
                vacios = true;
            }
        }
        
        if(vacios === true)
        {
            alertify.error("Algún campo está vacio, verifica por favor.");
        }
        else
        {
                    //Se envian los datos serializados.
                    $("div.login_sec").find("form#c-seguridad input#nva-pregunta").prop('disabled', false);
                    enviarForms('perfil/php/initPer.php', 2, area);
                    $(area).find("input#"+inputsname[0]).val('');
                    //$(area).find("input#"+inputsname[1]).val('');
                    //$(area).find("input#"+inputsname[2]).val('');
                    $(area).find("input#"+inputsname[3]).val('');
                    $("div.login_sec").find("form#c-seguridad input#nva-pregunta").prop('disabled', true);
        }
    });
    
    //----------- click en botón checkbox para habilitar cambio de pregunta de seguridad.
    $("div.login_sec").on("change", "form#c-seguridad input#check-cambio", function(event){
        var cambio = $("div.login_sec").find("form#c-seguridad input:checkbox").is(":checked");
       
        if(cambio === true)
        {
            $("div.login_sec").find("form#c-seguridad input#nva-pregunta").prop('disabled', false);
        }
        else
        {
            $("div.login_sec").find("form#c-seguridad input#nva-pregunta").prop('disabled', true);
        }
    });
    
    //----------- click en botón actualizar de área de Tiendas.
    $("div.login_sec").on("click", "button#act-tienda", function(event){
        var dir1 = $("div.login_sec").find("form#dir1 input:checkbox").is(":checked");
        var dir2 = $("div.login_sec").find("form#dir2 input:checkbox").is(":checked");
        
        if(dir1 === true)
        {
            validarForms('tiendas/php/initTie.php', 'Algún campo está vacio de la <h4>Tienda #1</h4>, ¿deseas continuar?', 0, "div.login_sec form#dir1", 1);
        }
        
        if(dir2 === true)
        {
            validarForms('tiendas/php/initTie.php', 'Algún campo está vacio de la <h4>Tienda #2</h4>, ¿deseas continuar?', 0, "div.login_sec form#dir2", 2);
        }
    });
    
    //----------- click en botón eliminar de área de Tiendas.
    $("div.login_sec").on("click", "button#eli-tienda", function(event){
        var dir1 = $("div.login_sec").find("form#dir1 input:checkbox").is(":checked");
        var dir2 = $("div.login_sec").find("form#dir2 input:checkbox").is(":checked");
        
        if(dir1 === true || dir2 === true)
        alertify.confirm("Se eliminarán los datos de las tiendas marcas, <b>¿estás seguro?</b>", function (e) {
            if (e) {
                if(dir1 === true)
                {
                    enviarForms('tiendas/php/initTie.php', 1, "div.login_sec form#dir1");
                }
                
                if(dir2 === true)
                {
                    enviarForms('tiendas/php/initTie.php', 1, "div.login_sec form#dir2");
                }
            } else {
                alertify.error("Se cancelo eliminación de datos de tiendas.");
            }
        });
    });
/*******************************************************************************************
 * Esta funcion serializa un form, que servirá para procesarlo en el archivo PHP. 
 * Funcion para verficar cada input de un form.
 * ******************************************************************************************/

    function validarForms(archivo, msj, acc, area, tienda)
    {
        var inputsname = [];
        var inputs = [];
        var vacios = false;
      $(area).find('input, textarea, select').each(function(){
            inputs.push($(this).val());
            inputsname.push($(this).attr('name'));
        });
        
        for(var i = 0; i < inputs.length; i++)
        {
            if(inputs[i] == '')
            {
                vacios = true;
            }
        }
        
        if(vacios === true)
        {
            alertify.confirm(msj, function (e) {
            if (e) {
                //alertify.success("Se actualizo información de la Tienda #"+tienda);
                enviarForms(archivo, acc, area);
            } else {
                alertify.error("Se cancelo información de la Tienda #"+tienda);
            }
        });
        }
        else 
        {
            enviarForms(archivo, acc, area);
        }
    }
    //------------------------------------------------------------------------
    function enviarForms(archivo, acc, area)
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
                 alertify.log(infoRegreso);
          },
          error: function (infoRegreso) {
              alertify.error(infoRegreso);
          }
      });
    }
    
    //------------------------------------------------------------------------
    function enviarFormEstadisticas(archivo, acc, area)
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
              if($.isNumeric(infoRegreso))
              {
                  alertify.error("No hay estadísitas entre esas fechas, elige otras.");
              }
              else
              {
                  alertify.alert(infoRegreso);
              }
                 
          },
          error: function (infoRegreso) {
              alertify.error(infoRegreso);
          }
      });
    }
    
    //----------------------- validaciones de un solo form.
    function validarForm(archivo, msj, acc, area, formulario, carga)
    {
        var inputsname = [];
        var inputs = [];
		var tamanio = 0;
      $(area).find('input, textarea, select').each(function(){
            inputs.push($(this).val());
			var nom = $(this).attr('name');
            inputsname.push(nom);
			if((nom == "img1" || nom == "img2" || nom == "img3" || nom == "img4") && $(this).val() != "")
			{
				if(this.files[0].size > 3145728)
				{
					switch(nom)
					{
						case "img1":
						tamanio = 1;
						break;
						case "img2":
						tamanio = 2;
						break;
						case "img3":
						tamanio = 3;
						break;
						case "img4":
						tamanio = 4;
						break;
					}
				}
			}
        });
        
		if(tamanio != 0) 
		{
			alertify.error("La imagen "+tamanio+" pesa más de 3 MB, verifica nuevamente");	
			return;
		}
        for(var i = 0; i < inputs.length; i++)
        {
            console.log(inputsname[i]);
            if(inputs[i] == '' && (inputsname[i] != 'img2' && inputsname[i] != 'img3' && inputsname[i] != 'img4'))
            {
                alertify.error(msj);
                return;
            }
        }
        
            switch(formulario) {
                case "login":
                   enviarFormLogin(archivo, acc, area);
                    break;
                case "nvoArt":
                   enviarForm(archivo, acc, area, carga);
                    break;
            }
    }
    
    function validarEliminar(cod)
    {
        var patt = /^[0-9_]+$/;
        if(patt.test(cod)) return true;
        
        return false;
    }
 //----------------------------------------------------------------------------------------
    function enviarForm(archivo, acc, area, carga)
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
			  console.log(infoRegreso);
             switch(parseInt(infoRegreso))
            {
                 case 1:
				 alertify.success("Artículo registrado correctamente.");
				 var pdf = $(area).find("input:checkbox").is(":checked");
				 if(pdf === true)
				 {
					window.open('articulos/php/pdf/index.php', '_blank'); 
				 }
				 break;
				 case -1:
				 alertify.error("Ocurrió un error, intenta nuevamente.");
				 break;
				 case -2:
				 alertify.error("Alguna imagen sobrepasa los 3 MB, verifica el tamaño.");
				 break;
			}
             
             if(carga != '' && parseInt(infoRegreso) != -2)
             {
                $("div.login_sec").find("div#areaDeEdicion").hide();
                $("div.login_sec").find("div#areaDeEdicion").load(carga);
                $("div.login_sec").find("div#areaDeEdicion").fadeIn(2000);
             }
             
          },
          error: function () {
              //$('#myModal').find('.modal-body p').text("Ocurrió un error, intenta nuevamente. :(");
              //$('#myModal').modal();
              alertify.error(infoRegreso);
          }
      });
    }
    
    //Esta función solo envia datos, no forms.
    function enviarDatos(archivo, dato, acc)
    {

        var date = new Date(); //Obtengo tiempo de expiración, 10 min. 
        date.setTime(date.getTime() + (10 * 60 * 1000));
        
        //var formData = new FormData($("div.login_sec form")[0]);
        $.cookie("accion",acc, {expires: date, path: "/"});
            $.ajax({
                data: {"cod":dato}, 
                url: archivo,
                type: 'post',
                async: false, //importantisimo, toma la variable al vuelo.
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                alertify.success(infoRegreso);
                },
                  error: function () {
                     alertify.error("Ocurrió un error, intenta de nuevo.");
                  }
            });
    }
    
    //Esta función solo envia datos, no forms. Es para buscar articulo antes de eliminar
    function enviarDatosBuscar(archivo, dato, acc)
    {

        var date = new Date(); //Obtengo tiempo de expiración, 10 min. 
        date.setTime(date.getTime() + (10 * 60 * 1000));
        
        //var formData = new FormData($("div.login_sec form")[0]);
        $.cookie("accion",acc, {expires: date, path: "/"});
            $.ajax({
                data: {"cod":dato}, 
                url: archivo,
                type: 'post',
                async: false, //importantisimo, toma la variable al vuelo.
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                    switch(parseInt(infoRegreso))
                    {
                        case -1:
                            alertify.error("No existe ningún producto con ese Código de Barras, intenta nuevamente.");
                            break;
                        case 1:
                            alertify.success("Artículo eliminado correctamente.");
                            break;
                            
                        default:
                                 alertify.set({ labels: {
                                ok     : "Eliminar",
                                cancel : "Cancelar"
                            } });
                            alertify.confirm(infoRegreso, function (e) {
                                if (e) {
                                    enviarDatosBuscar(archivo, dato, 2);
                                } else {
                                    alertify.error("Se ha cancelado eliminar artículo.");
                                }
                            });
                    }

                },
                  error: function () {
                     alertify.error("Ocurrió un error, intenta de nuevo.");
                  }
            });
    }
/**************************** función que genera el fade in-out ************************************************/
    function fadeInOut(dir)
    {
        $("div.login_sec").hide();
        $("div.login_sec").load(dir);
        $("div.login_sec").fadeIn(2000);
    }
/**************************** funciones de la página login ************************************************/
    $("button#ingresar-login").on("click", function(){
        /*********************
        *Orden de parametros: archivo que usará ajax, mensaje de error,  tipo de objeto creado (ver archivo anterior), lugar del form en el  html actual, finalmente tipo, se enviará un entero a la función para distinguir los formularios, ya que es el mismo algoritmo.
        **************/
        validarForm("../../php/objetos_Login.php", 'Algún campo está vacio, verifica',0, "div.login_sec form", "login");
    });
    //--------------------------------------------Form Login
    
    function enviarFormLogin(archivo, acc, area)
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
             if(parseInt(infoRegreso) == -1)
             {
                 alertify.log("El password y/o contraseña está incorrecto, verifica nuevamente.");
             }
             else {
                 $("body").fadeOut(1200, function(){
                     $(location).attr("href", '../edicion/adminPrin.php');
                 });
             }
             
          },
          error: function () {
              alertify.error("Ocurrió un error, intenta nuevamente.");
          }
      });
    }
});