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
					$dbname = "picDB";
					
					//Creating mySQL Connection
					$net = mysqli_connect($sername, $user, $pass, $dbname);
					
					//Checking for connection
					if(!$net)
					{
						die("Manhunt failed:" .mysqli_connect_error);	
					}
					
					//Creating mySQL DB
					$sqlDB = "CREATE DATABASE picDB";
					
					//Checking for successful creation of DB
					if(!mysqli_query($net, $sqlDB))					
					{
						echo "Picture DB has died: " .mysqli_error($net);
					}
					
					//create table
					$sqlTB = "CREATE TABLE day1TB(
						id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						name VARHCAR(30),
						photo VARBINARY(max),
						date TIME_STAMP
						)";
					INSERT INTO day1TB(photo)
					SELECT BulkColumn
					FROM Openrowset( Bulk)
						
					mysqli_close($net);
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
