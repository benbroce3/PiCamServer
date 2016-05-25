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
			$gate = "enter";
			if($_SESSION["SecretKey"] != $gate)
			{
				echo "<p style='color: red'> Please Enter Password Again... </p>"
			}
		?>
		<form action="passHandler.php" method="post">
			Enter Password Below <br>
			<input type="password" name="pass" maxlength="10">
			<input type="submit">
		</form>
	</body>
	<!--<?php echo htmlspecialcharacters(passHandler.php);?>-->
</html>
