<script type="text/javascript">
$(document).ready(function() {//Se inicia JQuery
//------------------------------------------------------------------------------------------------------------------------------------
    $("form#nvo-art-form input").on("change", function()
    {
        var id = $(this).parent("div").attr('id');
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; 
 
        if (/^image/.test( files[0].type)){ 
            var reader = new FileReader(); 
            reader.readAsDataURL(files[0]); 
 
            reader.onloadend = function(){ 
                $("#"+id).css({"background":"url("+this.result+")","background-size": "100% 100%","background-repeat": "no-repeat"});
            }
        }
    });
});

//--------------------------------------------- detecta cambio de combos boxes
    $('div#combos').on('change', 'select#sec', function() {
          $('div#combos').find("div#combosub").remove();
          $('div#combos').find("div#boxatributos").remove();
          if($(this).val() != '')
          {
            enviarDatos('articulos/php/initArt.php', 3, $(this).val());  
          }
    });
    
    $('div#combos').on('change', 'select#subc', function() {
          $('div#combos').find("div#boxatributos").remove();
          if($(this).val() != '')
          {
            var dato2 = $(this).val();
            var dato1 = $('div#combos').find("select#sec").val();
            enviarDatos('articulos/php/initArt.php', 4, dato1, dato2);  
          }
    });
//---------------------------- Envia los datos necesarios para generar los otros combos
//Esta función solo envia datos, no forms.
    function enviarDatos(archivo, acc, dato1, dato2)
    {
        var date = new Date(); //Obtengo tiempo de expiración, 10 min. 
        date.setTime(date.getTime() + (10 * 60 * 1000));
        
        //var formData = new FormData($(area)[0]);
        $.cookie("accion",acc, {expires: date, path: "/"});

            $.ajax({
                data: {"dato1":dato1, "dato2": dato2}, 
                url: archivo,
                type: 'post',
                async: false, //importantisimo, toma la variable al vuelo.
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                    if(parseInt(infoRegreso) == -1)
                    {
                        alertify.error("Ocurrió un error al cargar la información, intenta de nuevo.");
                    }
                    else
                    {
                        var nvoelemento = $(infoRegreso).hide();
                        switch(acc)
                        {
                            case 3:
                            $('div#combos').find("div#combosec").append(nvoelemento);
                            nvoelemento.show('normal');
                                break;
                            case 4:
                            $('div#combos').find("div#combosub").append(nvoelemento);
                            nvoelemento.show('normal');
                                break;
                        }
                    }
                
                },
                  error: function () {
                     alertify.error("Ocurrió un error, intenta de nuevo.");
                  }
            });
    }
</script>
<!-------------------------------------------Busqueda por dcodigo de barras------------------------------------------->
<form id="bus-cod-form">
<br><br><h3>Buqueda por codigo</h3><hr style="border-color: #BBB;">
<div class="row">
        <div class="col-xs-6 col-md-4">
          <div class=".col-xs-6" id="combos">
                <div class="form-group" id="combosec">
                  <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 text-center">
            <button type="button" class="btn btn-success" id="buscar-art">Buscar</button>
        </div>
</div>
</form>
<!-------------------------------------------Busqueda por categorias ------------------------------------------->
<form id="bus-art-form">
<br><br><h3>Buqueda por categoria</h3><hr style="border-color: #BBB;">
<div class="row">
        <div class="col-xs-6 col-md-4">
          <div class=".col-xs-6" id="combos">
                <div class="form-group" id="combosec">
                  <label for="sel1"><b class="infoObligatoria">Sección obligatoria:</b></label>
                  <select class="form-control" id="sec" name="sec">
                    <option value="">-------------------------</option>
                    
                    <?php
                        include('php/clasesFunciones.php');
                        $apartado = new Articulo();
                        $apartado->menuApartados();
                    ?>
                    
                  </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 text-center">
            <!--<p><h4>Guardar nuevo artículo</h4></p><hr>-->
            <button type="button" class="btn btn-success" id="buscar-art">Buscar</button>
        </div>
</div>
</form>
<!------- FIN AREA DE dropdown E inicio de confirmacion-------------------------------------------->
<hr style="border-color: #BBB;">
