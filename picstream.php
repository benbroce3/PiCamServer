<?php
	session_start();
	 //checking for cookie
	 $keycheck = "enter";
	if($_SESSION["SecretKey"] != $keycheck) 
	{
		echo "<script type = 'text/javascript'>\n";
		echo "window.location = 'index.php';\n";
		echo "</script>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Picture Stream</title>
		<!--Bootstrap Setup-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<!--<script src="bootstrap/bootstrap.min.js"></script>-->
	</head>
	<body>
		<div class="container-fluid">
			<!--Navigation Tabs-->
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs" style="text-align:center;">
						<li role="presentation" style="float:none; display:inline-block;"><a href="vidstream.php">Video Stream</a></li>
						<li role="presentation" style="float:none; display:inline-block;" class="active"><a href="picstream.php">Picture Stream</a></li>
					</ul>
				</div>
			</div
			<!--Pictures-->
			<div class="row">
				<?php
					//make reversed (chrono) array of image filenames
					$dirname = "pics/";
					$images = array_reverse(glob($dirname."*.jpg"));
					//recursively display all images in "pics" dir
					//formatted into 3 columns with timestamps beneath
					foreach($images as $image) {
						echo'
							<div class="col-md-4">
								<img src="'.$image.'" style="max-width:100%;max-height:100%;">
								<br>
								<center><h3>'.$image.'</h3></center>
							</div>
						';
					}
				?>
			</div>
			
			<!--
			<!--PHP accordion child function-->
			<?php
				//'.$image.'
				function picsFold() {
					echo'
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Collapsible Group Item #1
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									content here
								</div>
							</div>
						</div>
					';
				}
			?>
			
			
			<!--Accordion Parent-->
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php
					picsFold();
				?>
			</div>
			
			<!--Grab DateTime-->
			<?php
				// Print the array from getdate()
				print_r(getdate());
				echo "<br><br>";
				// Return date/time info of a timestamp; then format the output
				$mydate=getdate(date("U"));
				echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
			?>
			-->
		</div>
		<script>
			window.setInterval(myTimer, 10000);
			function myTimer()
			{
				location.reload();
			}
		</script>
	</body>
</html>
