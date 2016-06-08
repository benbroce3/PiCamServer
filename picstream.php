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
		<!--Bootstrap/jQuery Setup-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<script src="bootstrap/jquery-2.2.4.min.js"></script>
		<script src="bootstrap/bootstrap.min.js"></script>
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
			</div>
			<!--Pictures-->
			<?php
				//FUNCTIONS
				//Glob & display images in Bootstrap "col-md-4"s
				function showPics($picRegEx)
				{
					//make reversed (chrono) array of images filenames matching $picRegEx
					$images = array_reverse(glob("pics/".$picRegEx.".jpg"));
					//recursively display matching images
					foreach($images as $image) {
						echo'
							<div class="col-md-4">
								<img src="'.$image.'" style="max-width:100%; max-height:100%;">
								<br>
							</div>
						';
					}
				}
				
				//PHP Bootstrap Accordion Child
				function picsFold($foldNum, $foldName, $foldRegEx) {
					echo'
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading'.$foldNum.'">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$foldNum.'" aria-expanded="true" aria-controls="collapse'.$foldNum.'">
										LABEL
									</a>
								</h4>
							</div>
							<div id="collapse'.$foldNum.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$foldNum.'">
								<div class="panel-body">
									<div class="row">
					';
										showPics($foldRegEx);
					echo'
									</div>
								</div>
							</div>
						</div>
					';
				}
			?>
			
			<!--PHP Bootstrap Accordion Parent-->
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php
					//grab date & time
					$epoch = date("U");
					$today = getdate($epoch);
					//MAIN
					picsFold("One");
					picsFold("Two");
					picsFold("Three");
					picsFold("Four");
					picsFold("Five");
				?>
			</div>
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
