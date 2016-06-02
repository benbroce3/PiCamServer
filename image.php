<?php
        //set the content type header as jpeg
        header('Content-Type: image/jpeg');
        
        $images = array_reverse(glob("../pics/*.jpg"));
        
        //recursively display all images in "pics" dir
        foreach($images as $image) {
        	//output image
        	imagejpeg($image);
        	//free up memory
        	imagedestroy($image);
        }
?>
