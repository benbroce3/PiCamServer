<!DOCTYPE html>
<html>
	<header>
		<title>Pictures Stream</title>
	</header>
	<body>
		<?php
			$dirname = "pics/";
			$images = glob($dirname."*.png");
			foreach($images as $image) {
			echo '<img src="'.$image.'" /><br />';
			}
		?>
	</body>
</html>
