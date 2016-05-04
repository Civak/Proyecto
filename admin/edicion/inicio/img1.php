
<div id="cropContaineroutput-img1"></div>

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
				onAfterImgUpload: function(){ console.log('onAfterImgUpload---') },
				onImgDrag: function(){ console.log('onImgDrag----') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') }, //Al darle click en cortar
				onAfterImgCrop:function(){ 
					
					alertify.success('Imagen 1 se cambio correctamente...');
					$("div.login_sec").find("div#crop-img-box").fadeOut(1200, function(){
					$("div#cropContaineroutput-img1").remove();
					});
				}, //al darle click en cortar
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ 
					alertify.error('Ha ocurrido un error, intenta nuevamente.');
				}
		}
		
		var cropContaineroutput = new Croppic('cropContaineroutput-img1', croppicContaineroutputOptions);
</script>
