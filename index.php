<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<header>
		<title>Password Page</title>
	</header>
	<body >	
		<?php
			$gate = "close";
			if($_SESSION["SecretKey"] == $gate)
			{
				echo "<p style = 'color:red;'> Please Enter Password Again... </p>";
			}
		?>
		<form action="<?php echo htmlspecialchars(passHandler.php);?>" method="post">
			Enter Password Below <br>
			<input type="password" name="pass" maxlength="10">
			<input type="submit">
		</form>
	</body>
	
</html>
