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
//------------------------------------------------------------------------------------------------------------------------------------
    $('div#imagesUp').on('click','#borrar-img', function(){
       //var x = $(this).closest("div").find('input').css({"background":"#fff"});
       $(this).closest("div").find('input').val('');
       $(this).closest("div").find('input').parent("div").css({"background":"#fff"});
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



<!------- AREA DE IMAGENES -------------------------------------------->
<form id="nvo-art-form">
<h3>1. Elige al menos una imagen.</h3><hr style="border-color: #BBB;">
<div id="imagesUp" class="row">
  <div class="col-xs-6 col-md-3">
      <b class="infoObligatoria">*Imagen obligatoria</b>
    <a href="#" class="thumbnail">
        <div id="image-preview1" class="image-preview">
          <label class="plabel" for="image-upload" id="image-label1">Elige foto</label>
          <input class="pinput" type="file" name="img1" id="image-upload1" />
        </div>
    </a>
        <p><b id="borrar-img" class="btn btn-danger">Borrar</b></p>
  </div>
 <!------------------------------------------------------------>
  <br>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
        <div  class="image-preview" id="image-preview2">
          <label class="plabel" for="image-upload" id="image-label2">Elige foto</label>
          <input class="pinput" type="file" name="img2" id="image-upload2" />
        </div>
    </a>
    
      <p><b id="borrar-img" class="btn btn-danger">Borrar</b></p>
  </div>
 <!------------------------------------------------------------>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
        <div id="image-preview3" class="image-preview">
          <label class="plabel" for="image-upload" id="image-label3">Elige foto</label>
          <input class="pinput" type="file" name="img3" id="image-upload3" />
        </div>
    </a>
 
        <p><b id="borrar-img" class="btn btn-danger">Borrar</b></p>
  </div>
 <!------------------------------------------------------------>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
        <div  class="image-preview" id="image-preview4">
          <label class="plabel" for="image-upload" id="image-label4">Elige foto</label>
          <input class="pinput" type="file" name="img4" id="image-upload4" />
        </div>
    </a>

      <p><b id="borrar-img" class="btn btn-danger">Borrar</b></p>
  </div>
</div>
<!------- FIN AREA DE IMAGENES E inicio de drowdown-------------------------------------------->
<br><br><h3>2. Selecciona la sección, escribe código y descripción.</h3><hr style="border-color: #BBB;">
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
      <div class="col-xs-6 col-md-4">
        <div class="form-group">
                        <label for="usr"><b class="infoObligatoria">Código:</b></label>
                        <input type="text" class="form-control" id="cod" name="cod" placeholder="AABB1122CC33">
                        <label for="usr"><b class="infoObligatoria">Precio:</b></label>
                        <input type="text" class="form-control" id="pre" name="pre" placeholder="0000.00">
                         <label for="comment"><b class="infoObligatoria">Descripción:</b></label>
                        <textarea class="form-control" rows="5" id="comment" id="des" name="des" placeholder="Escribe una descripción del artículo"></textarea>
        </div>
      </div>
        <div class="col-xs-6 col-md-4 text-center">
            <p><h4>Guardar nuevo artículo</h4></p><hr>
            <button type="button" class="btn btn-success" id="confirmar-art">Confirmar</button>
        </div>
</div>
</form>
<!------- FIN AREA DE dropdown E inicio de confirmacion-------------------------------------------->
<hr style="border-color: #BBB;">


