<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Screenshots</title>
		<link rel="stylesheet" href="../css/base.css">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="../js/navigation.js"></script>
		<script src="../js/screenshots.js"></script>
	</head>
	<body id="screenshotsPage">
		<!-- Begin Main Wrapper -->
		<div id="mainWrapper">
			<!-- Begin Navigation Code -->
			<?php
			include "../includes/navigation.inc.php";
			?>
			<!-- End Navigation Code -->
			<!-- Begin Gallery Code -->
			<div class="box" id="gallery">
				<h2>Screenshots</h2>
				<!-- Begin Larger Image Wrapper -->
				<div id="bigImageWrapper">
					<p id="disclaimer">
						Disclaimer: I was the Lead Developer for the PCL Calculations, SeatShuffler, and Spinner websites. However,
						note that I worked in conjunction with the School of Pharmacy Educational Renaissance team to fabricate
						these software.
					</p>
					<img id="imgArrowRight" class="arrow right" src="../images/arrow_right_32.png" alt="arrow right">
					<img id="imgArrowLeft" class="arrow left" src="../images/arrow_left_32.png" alt="arrow left">
				</div>
				<!-- End Larger Image Wrapper -->
				<!-- Begin thumbnails code -->
				<div id="thumbnails">
					<img id="arrowRight" class="arrow right" src="../images/arrow_right_32.png" alt="arrow right">
					<img id="arrowLeft" class="arrow left" src="../images/arrow_left_32.png" alt="arrow left">
					<ul>
						<?php
						// instead of manually coding every picture, use php to enumerate the pictures
						$dir = 'images_screenshot/';
						if($dirHandle = opendir($dir)) {
							while(($file = readdir($dirHandle)) !== false) {
								// enumerate the thumbnails one by one
								if($file != '.' && $file != '..' && stripos($file, 'tb.png') !== false) {
									// set up the string that will be used for the title and alt attributes of the image
									$titleAlt = ucwords(str_replace('_', ' ', str_ireplace("_tb.png", "", $file))); 
									
									// populate and output the thumbnail markup code
									echo "<li><a><img src='{$dir}{$file}' alt='$titleAlt' title='$titleAlt'></a></li>\n";
								}
							}
						}
						
						?>
					</ul>
				</div>
				<!-- End thumbnails code -->
			</div>
			<!-- End Gallery code -->
		</div>
		<!-- End Main Wrapper -->
	</body>
</html>