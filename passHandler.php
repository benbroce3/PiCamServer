<?php
	//starting session
	session_start();
	//check for attempts and then sets cookie
	$doo = "banish";
	$nono = 0;
	if($_SESSION["attempt"] == 3)
	{
		//set cookie, expire in 2 hours
		setcookie($doo,$nono, time() + 7200, "/"); 
		$_SESSION["attempt"] = 0;
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
			echo  "window.location= 'Test.html';\n";
			echo "</script>";
			exit();
			
		}
		else
		{
			//Setting session variable
			$_SESSION["SecretKey"] = "close";
			//attempt counter
			$_SESSION['attempt'] += 1;
			
			echo "<script type = 'text/javascript'>\n";
			echo  "window.location= 'index.php';\n";
			echo "</script>";
			exit();
		}
	?>
	</body>
</html>
