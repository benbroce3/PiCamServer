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
				<object id="vlc" height="480" width="640">
					<param name="StartTime" value="40"/>
					<embed controls="true" type="application/x-vlc-plugin" pluginspage="http://www.videolan.org" target="vids/vidstream.h264"/>
				</object>
			</center>
	      		<script>
	      			var vlc = document.getElementById("vlc");
	      			//https://wiki.videolan.org/Documentation:WebPlugin/
	      			//http://stackoverflow.com/questions/14375767/embedding-vlc-plugin-on-html-page
	      			//vlc.input.time = vlc.input.length - 3;
	      			//vlc.input.position = 0.9;
			</script>
		</div>
	</body>
</html>
