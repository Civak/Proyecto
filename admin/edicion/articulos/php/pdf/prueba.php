<?php
/*$hashed_password = crypt('reymundo'); // dejar que el salt se genera automáticamente

echo $hashed_password;

if (hash_equals($hashed_password, crypt('mypassword', $hashed_password))) {
   echo "¡Contraseña verificada!";
}*/
include('barcode.php');  

$im     = imagecreatetruecolor(300, 300);  
$black  = ImageColorAllocate($im,0x00,0x00,0x00);  
$white  = ImageColorAllocate($im,0xff,0xff,0xff);  
imagefilledrectangle($im, 0, 0, 300, 300, $white);  
$data = Barcode::gd($im, $black, 150, 150, 0, "code128", "12345678", 2, 50);  
?>