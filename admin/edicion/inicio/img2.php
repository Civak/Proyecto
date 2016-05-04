<div id="caja-crop">
<h4>Selecciona y edita la foto para mostrar.</h4><span style="font-size:12px;">(Click sobre el icono superior derecho para seleccionar imagen)</span><hr>
<div id="cropContaineroutput-img2"></div>
</div>

<script>
var croppicContaineroutputOptions = {
				uploadUrl:'img_save_to_file.php',
				cropUrl:'img_crop_to_file.php', 
				outputUrlId:'cropOutput',
				modal:false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ 
					//$.cookie("img","img1", {path: "/"});
				},
				onAfterImgUpload: function(){ },
				onImgDrag: function(){},
				onImgZoom: function(){},
				onBeforeImgCrop: function(){ }, //Al darle click en cortar
				onAfterImgCrop:function(){ 
					
					alertify.success('Imagen se cambio correctamente...');
					$("div.login_sec").find("div#crop-img-box").fadeOut(1000, function(){
					$("div#caja-crop").remove();
					});
				}, //al darle click en cortar
				onReset:function(){},
				onError:function(errormessage){ 
					alertify.error(errormessage);
				}
		}
		
		var cropContaineroutput = new Croppic('cropContaineroutput-img2', croppicContaineroutputOptions);
</script>
