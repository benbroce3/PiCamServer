#!/usr/bin/ python

import cgi

import cgitb; cgitb.enable()  # for troubleshooting

print "Content-type:text/html\r\n\r\n"
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
			<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
			<!--<script src="../bootstrap/bootstrap.min.js"></script>-->
		</head>
		<body>
			<div class="container-fluid">
				<!--Navigation Tabs-->
				<div class="row">
					<div class="col-md-offset-4 col-md-4">
						<ul class="nav nav-tabs" style="text-align:center">
							<li role="presentation" class="active"><a href="vidstream.cgi">Video Stream</a></li>
							<li role="presentation"><a href="../picstream.php">Picture Stream</a></li>
							<li role="presentation"><a href="config.cgi">Configuration</a></li>
						</ul>
					</div>
					<div class="col-md-4">
					</div>
				</div>
				<!--Video-->
				<div class="row">
				</div>
			</div>
		</body>
	</html>
'''
