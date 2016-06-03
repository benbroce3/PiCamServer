error_reporting(0);
//set the content type header as jpeg
header('Content-Type: image/jpeg');
$image = "../pics/05-31-2016_15:32:04.jpg";
//output image
imagejpeg($image);
//free up memory
imagedestroy($image);
