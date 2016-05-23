<!DOCTYPE html>
<html>
	<header>
		<title>Pictures Stream</title>
	</header>
	<body>
		<?php
			$dirname = "pics/";
			$images = glob($dirname."*.jpg");
			foreach($images as $image) {
			echo '<img src="'.$image.'" height="360" width="540" /><br />';
			}
			
		?>
		<script>
			
			var mytimer = setInterval(reload, 10000);
			 function reload()
			 {
			 	location.reload(); 
			 }
			 
			)
		</script>
	</body>
</html>
