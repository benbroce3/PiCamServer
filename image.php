<?php
	header('Content-Type: image/jpeg');
	$src = "05-31-2016_15:31:51.jpg";
	//$image = "../pics/05-31-2016_15:32:04.jpg";
	$image = imagecreatefromjpeg($src);
	imagedestroy($image);
?>
