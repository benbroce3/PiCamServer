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
					$images = array_reverse(glob("pics/*.jpg"));
					
					//recursively display matching images
					foreach($images as $image) {
						if (($picRegEx <= basename($image, ".jpg")) && (basename($image, ".jpg") < ($picRegEx + 86400)))
						{
							echo'
								<div class="col-md-4">
									<img src="'.$image.'" style="max-width:100%; max-height:100%;">
									<br>
									<h3></h3>
								</div>
							';
						}
					}
				}
				
				//PHP Bootstrap Accordion Child
				function picsFold($foldNum, $foldName, $foldRegEx, $defaultOpen)
				{
					echo'
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading'.$foldNum.'">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$foldNum.'" aria-expanded="true" aria-controls="collapse'.$foldNum.'">
										'.$foldName.'
									</a>
								</h4>
							</div>
							<div id="collapse'.$foldNum.'" class="panel-collapse collapse'.$defaultOpen.'" role="tabpanel" aria-labelledby="heading'.$foldNum.'">
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
				
				//format a nice date for "x" days ago
				function niceDate($daysAgo)
				{
					global $epoch;
					$getday = getdate($epoch - ($daysAgo * 86400));
					return "$getday[weekday], $getday[month] $getday[mday]";
				}
				
				//get the minimum filename epoch time for "x" days ago
				function dayRegEx($daysAgo)
				{
					global $epoch;
					$todayEpoch = ((getdate($epoch)[hours]*3600) + (getdate($epoch)[minutes]*60) + (getdate($epoch)[seconds]));
					//if ($todayEpoch = 0)
					//{
					//	echo '
					//		<script>
					//			location.reload();
					//		</script>
					//	';
					//}
					$todayStart = ($epoch - $todayEpoch);
					return ($todayStart - ($daysAgo*86400));
				}
				
				//PHP Bootstrap Accordion Parent
				echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"><br>';
						//grab UNIX epoch time (secs)
						$epoch = date("U");
						//MAIN
						picsFold("One", niceDate(0), dayRegEx(0), " in");
						picsFold("Two", niceDate(1), dayRegEx(1), "");
						picsFold("Three", niceDate(2), dayRegEx(2), "");
						picsFold("Four", niceDate(3), dayRegEx(3), "");
						picsFold("Five", niceDate(4), dayRegEx(4), "");
				echo '</div>';
			?>
		</div>
		<!--<script>
			var $top = $("#collapseOne");
			$top.setInterval(reload, 10000);
			function reload()
			{
				$top.load("index.php");
			}
		</script>-->
		<!--<script>
			window.setInterval(myTimer, 10000);
			function myTimer()
			{
				location.reload();
			}
		</script>-->
	</body>
</html>
