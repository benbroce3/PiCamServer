<?php
	//starting session
	session_start();
	if($_SESSION["DudeWhy"] == 1)
	{
		//set cookie, expire in 2 hours
		setcookie("banish",, time() + 7200, "/"); 
		$_SESSSION["DudeWhy"] = 0;
	}
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
			//Counter Variable
			
			
			//Setting session variable
			$_SESSION["SecretKey"] = "close";
			
			$attempt = $attempt + 1;
			
			if($attempt == 3)
			{
				$_SESSION["DudeWhy"] = 1;
			}
			echo "<script type = 'text/javascript'>\n";
			echo  "window.location= 'index.php';\n";
			echo "</script>";
			exit();
		}
	?>
	</body>
</html>
