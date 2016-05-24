<?php
	//setting cookies
	
	$cookiename = "Monster";
	function cookiemaker()
	{
		setcookie($cookiename, time() + 60, "/");
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
			cookiemaker();
			echo "<script type = 'text/javascript'>\n";
			echo  "window.location= 'picstream.php';\n";
			echo "</script>";
			exit();
			
		}
		else
		{
		echo "<script type = 'text/javascript'>\n";
		echo  "window.location= 'passpage.html';\n";
		echo "</script>";
		exit();
		}
	?>
	</body>
</html>
