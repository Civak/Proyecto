<!--
Código necesario para poder cambiar el password, se llama este archivo mendiante AJAX.
-->
<div class="row">
    <form id="c-password">
		<div class="col-xs-6">
		    <h4>1.- Escribe tu contraseña actual.</h4><hr>
		    <div class="form-group">
              <label for="old-pwd"><b class="infoObligatoria">Contraseña actual:</b></label>
              <input type="password" class="form-control input-login" id="old-pwd" name="old-pwd">
            </div>
		</div>
		    <div class="col-xs-6">
		    <h4>2.- Escribe tu nueva contraseña.</h4><hr>
		    <div class="form-group">
              <label for="new-pwd1"><b class="infoObligatoria">Nueva contraseña:</b> <span style="font-size: 12px;">(Distingue entre mayúsculas y minúsculas)</span></label>
              <input type="password" class="form-control input-login" id="new-pwd1" name="new-pwd1">
            </div><br>
            <div class="form-group">
              <label for="new-pwd2"><b class="infoObligatoria">Repite nueva contraseña:</b></label>
              <input type="password" class="form-control input-login" id="new-pwd2" name="new-pwd2">
            </div>
            
            <button type="button" class="btn btn-c2" id="confi-pwd-cam">Confirmar cambios</button>
		    </div>
    </form>
</div>