<!DOCTYPE html>
<html>
  <body>
    <?php
      header('Content-Type: image/jpeg');
      $image = "../pics/05-31-2016_15:32:04.jpg";
      //output image
      imagejpeg($image);
      //free up memory
      imagedestroy($image);
    ?>
  </body>
</html>
