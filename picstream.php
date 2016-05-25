<?php
	session_start();
	 //checking for cookie
	 $keycheck = "enter";
	if($_SESSION["SecretKey"] != $keycheck) 
	{
		echo "<script type = 'text/javascript'>\n";
		echo  "window.location = 'passpage.html';\n";
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
				<div class="col-md-12">
					<center>
						<ul class="nav nav-tabs" style="text-align:center">
							<li role="presentation"><a href="vidstream.php">Video Stream</a></li>
							<li role="presentation" class="active"><a href="picstream.php">Picture Stream</a></li>
							<li role="presentation"><a href="cgi-bin/config.py">Configuration</a></li>
						</ul>
					</center>
				</div>
			</div>
			<!--Pictures-->
			<div class="row">
				<?php
					//make reversed (chrono) array of image filenames
					$dirname = "pics/";
					$images = array_reverse(glob($dirname."*.jpg"));
					//recursively display all images in "pics" dir
					//formatted into 3 columns with timestamps beneath
					foreach($images as $image) {
						echo'
							<div class="col-md-4">
								<img src="'.$image.'" style="max-width:100%;max-height:100%;">
								<br>
								<center><h3>'.$image.'</h3></center>
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
