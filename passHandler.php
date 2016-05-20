
	<html>
	<body>
	<h2>hi<h2>
		<?php
			//password variable
			$password = "bo";
		
			if ($_POST['pass'] = $password)
			{
				
			?>	
				<script type='text/javascript'>
					window.location.href = 'picstream.html';
					</script>;
			<?php
				exit();
			}
			else 
			{
				?>
				<script type='text/javascript'>
					window.location.href = 'passpage.html';
				</script>
				<?php
				exit();
			}
		?>

	</body>
	</html>
