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
						<li role="presentation"><a href="cgi-bin/vidstream.cgi">Video Stream</a></li>
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
					//mySQL Variables
					$sername = "localhost";
					$user = "";
					$pass = "";
					
					//Creating mySQL Connection
					$net = new mysqli($sername, $user, $pass);
					
					//Checking for connection
					if($net->connect_error)
					{
						die("Manhunt failed:" .$net->connect_error);	
					}
					
					//Creating mySQL DB
					$sqlDB = "CREATE DATABASE picDB";
					//Checking for successful creation of DB
					if($net->query($sqlDB) === FALSE)					
					{
						echo "Picture DB has died: " .$net->error;
					}
					
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
