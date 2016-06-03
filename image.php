<?php
  header('Content-Type: image/jpeg');
  $image = "../pics/05-31-2016_15:32:04.jpg";
  $src = imagecreatefromjpeg($image);
  $new_width=480;
  $new_height=360;
  $w_src=1920;
  $h_src=1080;
  $img=imagecreatetruecolor($new_width,$new_height);
  imagecopyresampled($img,$src,0,0,0,0,$new_width,$new_height,$w_src,$h_src);
  imagejpeg($img,NULL,45);
  //$cacheFile=$cache_dir.$cacheFile;
  //imagejpeg($img,$cacheFile,45);
  imagedestroy($src);
  imagedestroy($img);
?>
