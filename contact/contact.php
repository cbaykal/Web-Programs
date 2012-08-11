<?php

/* ***Begin Functions*** */
function getValue($name) {
	// in case of a refresh or incomplete submission, restore the user's input accordingly
	return $_POST && isset($_POST[$name]) ? $_POST[$name] : "";
}

/* ***End Functions*** */

// Arrays will hold errors and missing inputs for later use
$errors = array();
$missing = array();


if(isset($_POST['send'])) {
	// Required inputs
	$expected = array('name', 'email', 'feedback', 'section');
	$required = array('name', 'email', 'feedback');
	if(!isset($_POST['section'])) {
		$_POST['section'] = array(); // so that a 'sections' is a part of the $_POST array
	}
	
	$to = 'baykal@live.unc.edu';
	$subject = 'UNC Website Feedback';
	// additional headers
	$headers = "From: UNC Website<feedback@unc.edu>\r\n";
	$headers .= 'Content-type: text/plain; charset=utf-8';
	require "../includes/mailProcessing.inc.php";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contact</title>
		<link rel="stylesheet" href="../css/base.css">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="../js/navigation.js"></script>
		<script src="../js/contact.js"></script>
	</head>
	<body id="contactPage">
		<!-- Begin Main Wrapper -->
		<div id="mainWrapper">
			<!-- Begin Navigation -->
			<?php 
			include "../includes/navigation.inc.php";
			?>
			<!-- End Navigation -->
			<!-- Begin Feedback -->
			<div id="feedbackDiv" class="box">
				<h2>Contact Me</h2>
				<?php
				if($POST && ($suspect || $errors['mailTo'])) {
					echo 'p class="warning">Your feedback could not be sent. Please try again later';
				} else if($missing || $errors) {
					echo '<p class="warning">Please fix the problem(s) below.</p>';
				} else if($_POST && $mailSent) {
					echo '<p class="success">Your email has been sent. Thank you for your feedback!</p>';
					$_POST = array(); // clear the $_POST array
				}
				?>
				<form id="feedback" method="post" action="">
					<table>
						<tr>
							<td>
								<label for="name">Name:
								<?php
								if($missing && in_array('name', $missing)) {
									echo '<p class="warning">Please enter your name.</p>';
								}
								?>
								</label>
							</td>
							<td>
								<input type="text" id="name" name="name" value="<?php echo getValue('name'); ?>">
							</td>
						</tr>
						<tr>
							<td>
								<label for="email">Email:
								<?php
								if($missing && in_array('email', $missing)) {
									echo "<p class='warning'>Please enter your email address.</p>";
								} else if($errors['email']) {
									echo "<p class='warning'>Please enter a valid email address.</p>";
								}
								?>
								</label>
							</td>
							<td>
								<input type="text" id="email" name="email" value="<?php echo getValue('email'); ?>">
							</td>
						</tr>
						<tr>
							<td>
								Sections that need improvement (optional):
							</td>
							<td>
								<fieldset id="improvements">
									<p>
										<input type="checkbox" id="home" name="section[]" value="Home"
										<?php
										if($_POST && in_array('Home', $_POST['section'])) {
											echo 'checked';
										}
										?>>
										<label for="home">Home Page</label>
									</p>
									<p>
										<input type="checkbox" id="programs" name="section[]" value="Programs"
										<?php
										if($_POST && in_array('Programs', $_POST['section'])) {
											echo 'checked';
										}
										?>>
										<label for="programs">Programs</label>
									</p>
									<p>
										<input type="checkbox" id="screenshots" name="section[]" value="Screenshots"
										<?php
										if($_POST && in_array('Screenshots', $_POST['section'])) {
											echo 'checked';
										}
										?>>
										<label for="screenshots">Screenshots</label>
									</p>
									<p>
										<input type="checkbox" id="contact"name="section[]" value="Contact" 
										<?php
										if($_POST && in_array('Contact', $_POST['section'])) {
											echo "checked";
										}
										?>>
										<label for="contact">Contact</label>
									</p>
								</fieldset>
							</td>
						</tr>
						<tr>
							<td>
								<label for="feedback">Feedback:
								<?php 
								if($missing && in_array('feedback', $missing)) {
									echo "<p class='warning'>Please enter your feedback.</p>";
								}
								?>
								</label>
							</td>
							<td>
								<textarea id="feedback" name="feedback"><?php echo getValue('feedback'); ?></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="send" value="Send Feedback">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<!-- End Feedback -->
		</div>
		<!-- End Main Wrapper -->
	</body>
</html>