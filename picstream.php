<DOCTYPE! html>
<html>
	<header>
		<title>Picture Stream</title>
	</header>
	<body>
		<center><h1>Picture Stream:</h1></center>
		<?php
			$dirname = "pics/";
			$images = glob($dirname."*.jpg");
			foreach($images as $image) {
			echo '<img src="'.$image.'" height="400" width="600" /><br />';
			}
		?>
		<script>
			window.setInterval(myTimer, 10000);
			function myTimer()
			{
				location.reload(); 
			} 
		</script>
	</body>
</html>
