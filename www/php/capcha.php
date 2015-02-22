<?php header("Content-Type: image/png");
	$string1='Рустамfre';
	$rand=mt_rand(1000,9999);
	$im=imageCreatetruecolor(100,50);
	$c=ImageColorAllocate($im,120,220,100);
	Imagettftext($im,20,-10,10,30,$c,"Font/timesi.ttf",$rand);
	ImagePng($im);
	ImageDestroy($im);
?>