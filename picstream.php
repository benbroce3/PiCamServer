<?php
	 //checking for cookie
		        $namecheck = "Monster";
			if(!isset($_COOKIE[$namecheck])) 
			{
				echo "<script type = 'text/javascript'>\n";
				echo  "window.location= 'passpage.html';\n";
				echo "</script>";
				exit();
			}
?>


<html>
	<header>
		<title>Picture Stream</title>
	</header>
	<body>
		<center><h1>Picture Stream:</h1></center>
		<?php
			$dirname = "pics/";
			$images = array_reverse(glob($dirname."*.jpg"));
			foreach($images as $image) {
			echo '<img src="'.$image.'" height="400" width="600">';
			echo '<br>';
			echo '<h3>'.$image.'</h3>';
			echo '<br>';
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
