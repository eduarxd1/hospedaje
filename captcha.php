<?php

header("content-type: image/png");
$imagen=imagecreate(75, 35) or die("ocurrio un error con la libreria");
$color_fondo=imagecolorallocate($imagen, 0, 0, 0);
$color_texto=imagecolorallocate($imagen, 255, 255, 255);

function generate_captcha($chars,$length)
{
	$captcha=null;
	for($x=0;$x<$length;$x++)
	{
		$rand=rand(0,count($chars)-1);
		$captcha.=$chars[$rand];
	}
	return $captcha;
}
$captcha=generate_captcha(array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'), 6);
setcookie('captcha', sha1($captcha), time()+60*3);
imagestring($imagen, 10, 10, 10, $captcha, $color_texto);
imagepng($imagen);
?>