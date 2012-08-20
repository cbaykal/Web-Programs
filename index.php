

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" href="css/base.css">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/home.js"></script>
		<script src="js/navigation.js"></script>
	</head>
	<body id="homepage">
		<!-- Begin Main Wrapper -->
		<div id="mainWrapper">
			<!-- Begin Navigation -->
			<?php
			include "./includes/navigation.inc.php";
			?>
			<!-- End Navigation -->
			<!-- Begin Main Content -->
			<div class="box" id="content">
				<h1 class="title">Welcome</h1>
				<p>
					Hello there, welcome to my website! Feel free to peruse around the website. In this website, you will 
					find many examples of the programs I have written over the years as well as the recent software that I am 
					currently working on. Furthermore, in compliance with Open-Source Software ideals and standards,
					you can find the source code to any sofware displayed in this website (as well as the website itself),
					study, and improve as you deem necessary. You can find more information about the website and its purpose
					<a href="#faq">below</a> in the FAQ section. 
				</p>
			</div>
			<!-- End Main Content -->
			<!-- Begin Updates -->
			<div class="box" id="updates">
				<h2>Updates</h2>
				<!--Begin Updates Box-->
				<div id="updatesBox">
					<!-- Begin Tab Links -->
					<ul id="updatesLinks">
						<!-- IMPORTANT: The order of these will be switched through home.js to make new additions of updates
							a lot more convenient and to ensure the latest update will be displayed as update1 -->
						<li><a href="#update1">1</a></li>
						<li><a href="#update2">2</a></li>
						<li><a href="#update3">3</a></li>
						<li><a href="#update4">4</a></li>
						<li><a href="#update5">5</a></li>
						<li><a href="#update6">6</a></li>
						<li><a href="#update7">7</a></li>
						<li><a href="#update8">8</a></li>
					</ul>
					<!-- End Tab Links-->
					<!-- Begin Update 1-->
					<div id="update1" class="update">
						<h3>August 4, 2012</h3>
						<div class="message">
							<p>
								Deleted old website and launched a new one utilizing CSS3, jQuery, and a lot more!
							</p>
						</div>
					</div>
					<!-- End Update 1-->
					<!-- Begin Update 2-->
					<div id="update2" class="update">
						<h3>August 5, 2012</h3>
						<div class="message">
							<p>
								Added navigation bar, and improved overall appearance of the website.
							</p>
						</div>
					</div>
					<!-- End Update 2-->
					<!-- Begin Update 3-->
					<div id="update3" class="update">
						<h3>August 6, 2012</h3>
						<div class="message">
							<p>
								Added screenshots section and implemented a slider. The screenshots section includes the majority of the software 
								that I developed for the Eshelman School of Pharmacy. Click <a class="ref" target="_blank" href="/~baykal/screenshots/screenshots.php">here</a> 
								to view the Screenshots section.
							</p>
						</div>
					</div>
					<!-- End Update 3-->
					<!-- Begin Update 4-->
					<div id="update4" class="update">
						<h3>August 7, 2012</h3>
						<div class="message">
							<p>
								Added Contact section. Now you can email me with any feedback or commentary that you may have. Click
								<a class="ref" href="/~baykal/contact/contact.php" target="_blank">here</a> to send me an email and let me know what you think!
							</p>
						</div>
					</div>
					<!-- End Update 4-->
					<!-- Begin Update 5-->
					<div id="update5" class="update">
					<h3>August 8, 2012</h3>
						<div class="message">
							<p>
								Added the slide show you are seeing right now to the homepage. What do you think of it? Send me an email
								<a class="ref" href="/~baykal/contact/contact.php" target="_blank">here</a> and let me know!
							</p>
						</div>
					</div>
					<!-- End Update 5-->
					<!-- Begin Update 6-->
					<div id="update6" class="update">
					<h3>August 9, 2012</h3>
						<div class="message">
							<p>
								Finished laying out the template for the Programs section. The links to the parts under Programs 
								should now work. However, I have not uploaded any source code yet. Want to see what it looks like?
								Check out the <a class="ref" href="/~baykal/programs/c++/c++.php" target="_blank">C++ Programs</a> section.
							</p>
						</div>
					</div>
					<!-- End Update 6-->
					<!-- Begin Update 7-->
					<div id="update7" class="update">
					<h3>August 10, 2012</h3>
						<div class="message">
							<p>
								Finished implementing tabs layout, with the capability to host sources for multiple programs within a page, 
								for all of the Programs sections. For example, check out the 
								<a class="ref" href="/~baykal/programs/web/web.php" target="_blank">Web Programs</a> page.
							</p>
						</div>
					</div>
					<!-- End Update 7-->
					<!-- Begin Update 8-->
					<div id="update8" class="update">
					<h3>August 12, 2012</h3>
						<div class="message">
							<p>
								Got a few sources up on GitHub. Check out the <a class="ref" href="/~baykal/programs/web/web.php" target="_blank">Web Programs</a> 
								and <a class="ref" href="/~baykal/programs/java/java.php" target="_blank">Java Programs</a> pages!
							</p>
						</div>
					</div>
					<!-- End Update 8-->
				</div>
				<!-- End Updates Box -->
			</div>
			<!-- End Updates -->
			<!-- Begin FAQ -->
			<div class="box" id="faq">
				<h2><span id="notso">Rarely</span> Frequently Asked Questions</h2>
				<h3>Who are you and why did you make this website?</h3>
				<div class="answer">
					<p>
					I am a rising sophomore at the University of North Carolina: Chapel Hill. I am majoring in Computer Science and Mathematics.
					The purpose of this website is to provide a testing platform for my web development abilities as well as to promote open-source software.
					</p>
				</div>
				<h3>What is Open-Source Software?</h3>
				<div class="answer">
				From Wikipedia:
				<blockquote>
					Open-source software (OSS) is computer software that is available in source code form: the source code and certain other rights normally reserved for copyright holders are provided under an open-source license that permits users to study, change, improve and at times also to distribute the software.
				</blockquote>
				<p>
					Why is open-source software great? Well, you are reaping the benefits of open-source software as you read this. I am using jQuery, an open source JavaScript library that makes JavaScript utilization less of a hassle and programming more efficient, to display this paragraph.
				 	Without jQuery, this FAQ Section would have taken a lot more effort and time to fabricate.
				</p>
				<p>
					jQuery is licensed under <a class="ref" href="http://en.wikipedia.org/wiki/MIT_License" target="_blank">MIT</a> and <a class="ref" href="http://en.wikipedia.org/wiki/GNU_General_Public_License" target="_blank">GPL</a> licenses. 
					To read more about jQuery see <a class="ref" href="http://en.wikipedia.org/wiki/JQuery" target="_blank">here.</a>
					To learn more about open source software, look <a href="http://en.wikipedia.org/wiki/Open-source_software" target="_blank">here.</a>
				</p>
				</div>
				<h3>How can I give feedback about your work or this website?</h3>
				<div class="answer">
					<p>
						Your feedback and comments are greatly appreciated. You can email me by clicking <a class="ref" href="/~baykal/contact/contact.php" target="_blank">here</a>,
						or alternatvely by visiting the 'Contact' page which is located in the navigation bar towards the upper right corner of the page.
					</p>
				</div>
			</div>
			<!-- End FAQ -->
		</div>
		<!-- End Main Wrapper -->
	</body>
</html>