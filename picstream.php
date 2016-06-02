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
		<title>Picture Stream</title>
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
						<li role="presentation"><a href="vidstream.php">Video Stream</a></li>
						<li role="presentation" class="active"><a href="picstream.php">Picture Stream</a></li>
						<li role="presentation"><a href="cgi-bin/config.cgi">Configuration</a></li>
					</ul>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<!--Pictures-->
			<div class="row">
				<?php	
					$images = array_reverse(glob("pics/*.jpg"));
					//recursively display all images in "pics" dir
					//formatted into 3 columns with timestamps beneath
					foreach($images as $image) {
						//$content = file_get_contents($image);
						echo'
							<div class="col-md-4">
						';
						// Set the content type header - in this case image/jpeg
						header('Content-Type: image/jpeg');
						// Output the image
						imagejpeg($image);
						// Free up memory
						imagedestroy($im);
						echo'
								<br>
							</div>
						';
					}
				?>
				<script>
					window.setInterval(myTimer, 10000);
					function myTimer()
					{
						location.reload();
					}
				</script>
			</div>
		</div>
	</body>
</html>
