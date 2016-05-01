<!--
Código necesario para poder cambiar el nickname, se llama este archivo mendiante AJAX.
-->
<div class="row">
    <form id="c-nick">
		<div class="col-xs-6">
		    <h4>1.- Escribe tu contraseña.</h4><hr>
		    <div class="form-group">
              <label for="pwd"><b class="infoObligatoria">Contraseña actual:</b></label>
              <input type="password" class="form-control input-login" id="pwd" name="pwd">
            </div>
		</div>
		    <div class="col-xs-6">
		    <h4>2.- Escribe tu nuevo Nick.</h4><hr>
		    <div class="form-group">
              <label for="new-pwd1"><b class="infoObligatoria">Nuevo Nick:</b> <span style="font-size: 12px;">(Distingue entre mayúsculas y minúsculas)</span></label>
              <input type="text" class="form-control input-login" id="nvo-nick" name="nvo-nick">
            </div><br>
            
            <button type="button" class="btn btn-c2 text-right" id="confi-nick-cam">Confirmar cambios</button>
		    </div>
    </form>
</div>