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

<?php
//DEBUGGER

// ----------------------------------------------------------------------------------------------------
// - Display Errors
// ----------------------------------------------------------------------------------------------------
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

// ----------------------------------------------------------------------------------------------------
// - Error Reporting
// ----------------------------------------------------------------------------------------------------
error_reporting(-1);

// ----------------------------------------------------------------------------------------------------
// - Shutdown Handler
// ----------------------------------------------------------------------------------------------------
function ShutdownHandler()
{
    if(@is_array($error = @error_get_last()))
    {
        return(@call_user_func_array('ErrorHandler', $error));
    };

    return(TRUE);
};

register_shutdown_function('ShutdownHandler');

// ----------------------------------------------------------------------------------------------------
// - Error Handler
// ----------------------------------------------------------------------------------------------------
function ErrorHandler($type, $message, $file, $line)
{
    $_ERRORS = Array(
        0x0001 => 'E_ERROR',
        0x0002 => 'E_WARNING',
        0x0004 => 'E_PARSE',
        0x0008 => 'E_NOTICE',
        0x0010 => 'E_CORE_ERROR',
        0x0020 => 'E_CORE_WARNING',
        0x0040 => 'E_COMPILE_ERROR',
        0x0080 => 'E_COMPILE_WARNING',
        0x0100 => 'E_USER_ERROR',
        0x0200 => 'E_USER_WARNING',
        0x0400 => 'E_USER_NOTICE',
        0x0800 => 'E_STRICT',
        0x1000 => 'E_RECOVERABLE_ERROR',
        0x2000 => 'E_DEPRECATED',
        0x4000 => 'E_USER_DEPRECATED'
    );

    if(!@is_string($name = @array_search($type, @array_flip($_ERRORS))))
    {
        $name = 'E_UNKNOWN';
    };

    return(print(@sprintf("%s Error in file \xBB%s\xAB at line %d: %s\n", $name, @basename($file), $line, $message)));
};

$old_error_handler = set_error_handler("ErrorHandler");
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
						if ($picRegEx <= basename($image, ".jpg") && basename($image, ".jpg") < ($picRegEx + 86400))
						{
							echo'
								<div class="col-md-4">
									<img src="'.$image.'" style="max-width:100%; max-height:100%;">
									<br>
								</div>
							';
						}
					}
				}
				
				//PHP Bootstrap Accordion Child
				function picsFold($foldNum, $foldName, $foldRegEx)
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
				
				//format a nice date for "x" days ago
				function niceDate($daysAgo)
				{
					global $epoch;
					$getday getdate($epoch - ($daysAgo * 86400));
					return "getday[weekday], getday[month] getday[mday]";
				}
				
				//get the minimum filename epoch time for "x" days ago
				function dayRegEx($daysAgo)
				{
					global $epoch;
					$todayStart = ($epoch - ((getdate($epoch)[hours]*3600) + (getdate($epoch)[minutes]*60) + (getdate($epoch)[seconds])));
					return ($todayStart - (daysAgo*86400));
				}
				
				//PHP Bootstrap Accordion Parent
				echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
						//grab UNIX epoch time (secs)
						$epoch = date("U");
						//MAIN
						picsFold("One", niceDate(0), dayRegEx(0));
						picsFold("Two", niceDate(1), dayRegEx(1));
						picsFold("Three", niceDate(2), dayRegEx(2));
						picsFold("Four", niceDate(3), dayRegEx(3));
						picsFold("Five", niceDate(4), dayRegEx(4));
				echo '</div>';
			?>
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
