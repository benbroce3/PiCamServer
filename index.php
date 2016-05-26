<?php
	session_start();
	$cookieGuard = "banish";
	if(isset($_COOKIE[$cookieGuard]))
	{
		header('Location: www.google.com');
		exit();
	}
	

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
		<form action="<?php $page = "passHandler.php"; echo htmlspecialchars($page);?>" method="post">
			Enter Password Below <br>
			<input type="password" name="pass" maxlength="10">
			<input type="submit">
		</form>
	</body>
	
</html>
