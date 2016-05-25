import cgi
print "Content-Type: text/html"
print '''
	<?php
		session_start();
		 //checking for cookie
		 $keycheck = "enter";
		if($_SESSION["SecretKey"] != $keycheck) 
		{
			echo "<script type = 'text/javascript'>\n";
			echo  "window.location = 'index.php';\n";
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
					<div class="col-md-12">
						<center>
							<ul class="nav nav-tabs" style="text-align:center">
								<li role="presentation" class="active"><a href="vidstream.py">Video Stream</a></li>
								<li role="presentation"><a href="picstream.php">Picture Stream</a></li>
								<li role="presentation"><a href="cgi-bin/config.py">Configuration</a></li>
							</ul>
						</center>
					</div>
				</div>
				<!--Video-->
				<div class="row">
				</div>
			</div>
		</body>
	</html>
'''
