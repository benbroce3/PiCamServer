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
						<li role="presentation"><a href="cgi-bin/config.py">Configuration</a></li>
					</ul>
				</div>
			</div>
			<!--Pictures-->
			<div class="row">
				<?php
					//make reversed (chrono) array of image filenames
					$dirname = "pics/";
					function getPics() {
						$images = array_reverse(glob($dirname."*.jpg"));
					}
					getPics();
					//count the number of images in array
					$picNum = count($images);
					//recursively display all images in "pics" dir
					//formatted into 3 columns with timestamps beneath
					foreach($images as $image) {
				?>
						<div class="col-md-4">
							<img src="'.$image.'" style="max-width:100%;max-height:100%;">
							<br>
							<center><h3>'.$image.'</h3></center>
						</div>
				<?php
					}
					//reload when $picnum != count($images)
					while(1) {
						getPics();
						if ($picNum != count($images)) {
							break;
						}
					}
				?>
					<script>
						location.reload();
					</script>
			</div>
		</div>
	</body>
</html>
