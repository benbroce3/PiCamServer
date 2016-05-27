<?php
	session_start();
	 //checking for cookie
	 $keycheck = "enter";
	if($_SESSION["SecretKey"] != $keycheck) 
	{
		echo "<script type = 'text/javascript'>\n";
		echo "window.location = 'index.php';\n";
		echo "</script>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Video Stream</title>
		<!--Bootstrap Setup-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<!--<script src="bootstrap/bootstrap.min.js"></script>-->
	</head>
	<body>
		<div class="container-fluid">
			<!--Navigation Tabs-->
			<div class="row">
				<div class="col-md-offset-4 col-md-4">
					<ul class="nav nav-tabs" style="text-align:center">
						<li role="presentation" class="active"><a href="vidstream.php">Video Stream</a></li>
						<li role="presentation"><a href="picstream.php">Picture Stream</a></li>
						<li role="presentation"><a href="cgi-bin/config.cgi">Configuration</a></li>
					</ul>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<!--Video-->
			<center>
	      			<embed id="vid" type="application/x-vlc-plugin" pluginspage="http://www.videolan.org" target="vids/vidstream.h264" height="480" width="640"/>
			</center>
	      		<script>
		      		//document.getElementById("vid").addEventListener('loadedmetadata', function() {
	  			document.getElementById("vid").currentTime = 20//(document.getElementById("vid").duration - 2);
				//}, false);
			</script>
		</div>
	</body>
</html>
