<DOCTYPE! html>
<html>
	<header>
		<title>Picture Stream</title>
		<!--Bootstrap Setup-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<!--<script src="bootstrap/bootstrap.min.js"></script>-->
	</header>
	<body>
		<div class="container-fluid">
			<!--Navigation Tabs-->
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs" style="text-align:center">
						<li role="presentation"><a href="vidstream.php">Video Stream</a></li>
						<li role="presentation" class="active"><a href="picstream.php">Picture Stream</a></li>
					</ul>
				</div>
			</div>
			<!--Pictures-->
			<div class="row">
				<?php
					//make reversed array of image names
					$dirname = "pics/";
					$images = array_reverse(glob($dirname."*.jpg"));
					//count the number of images in array
					$picnum = count($images); //reload when picnum != count($images)
					//recursively display all images in "pics" dir
					//formatted into 3 columns with timestamps beneath
					foreach($images as $image) {
				?>
						<div class="col-md-4">
							<img src="'.$image.'" height="400" width="600">
							<br>
							<center><h3>'.$image.'</h3></center>
						</div>
				<?php
					}
				?>
				<script>
					window.setInterval(myTimer, 10000);
					function myTimer()
					{
						location.reload(); 
					} 
				</script>
			</div>
		</div>
	</body>
</html>
