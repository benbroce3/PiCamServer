<?php
	//starting session
	session_start();
	
?>

<html>
<body>
<h2>Checking...<h2>
	<?php
		//password variable
		$password = "bo";
		if ($_POST["pass"] == $password)
		{
			//setting session variable
			$_SESSION["SecretKey"] = "enter";
			
			echo "<script type = 'text/javascript'>\n";
			echo  "window.location= 'picstream.php';\n";
			echo "</script>";
			exit();
			
		}
		else
		{
			//Setting session variable
			$_SESSION["SecretKey"] = "close";
			
			echo "<script type = 'text/javascript'>\n";
			echo  "window.location= 'index.html';\n";
			echo "</script>";
			exit();
		}
	?>
	</body>
</html>
