<?php
  header('Content-Type: image/jpeg');
  $src = "../pics/05-31-2016_15:32:04.jpg";
  $image = imagecreatefromjpeg($src);
  //output image
  imagejpeg($image,NULL);
  //free up memory
  imagedestroy($image);
?>
