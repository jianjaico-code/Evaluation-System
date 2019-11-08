<?php 
	include("connection.php");
	$q = "SELECT Evaluation_ScheduleTo FROM evaluation ORDER BY Evaluation_id DESC";
    $result =  $conn -> query($q);
    $row = $result -> fetch_object();

     if($row == null){
    	echo "No Evaluation";
    }
    else{
    	$dataTo = $row -> Evaluation_ScheduleTo;
    	$dateEnd = date('Y-m-d', strtotime($dataTo));	
    }
    

 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Face: Faculty Evaluation System</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Jerico C. Borja">
		<link rel="icon" href="img/logoFacE.gif">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<style>
		#demo{
		  text-align: center;
		  font-size: 40px;
		  margin-top: 0px;
		}
		header.masthead .intro-text {
		    padding-top: 190px;
		    padding-bottom: 100px;
		}
		</style>
	</head>
	<body id="home" >
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top">
			<div class="container">
				<a href="#home" class="navbar-brand">

					<img src="img/logoFacE.gif" width="50" height="50" alt="" id="logo">  <span class="d-inline align-middle">Faculty Evaluation</span>
				</a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a href="#home" class="nav-link">Home</a>
						</li>
						<li class="nav-item">
							<a href="#services" class="nav-link">Services</a>
						</li>
						<li class="nav-item">
							<a href="#faq" class="nav-link">FAQ</a>
						</li>
						<li class="nav-item">
							<a href="#team" class="nav-link">Team</a>
						</li>
						<li class="nav-item">
							<a href="#contact" class="nav-link">Contact us</a>
						</li>
						<li class="nav-item">
							<a href="login.php" class="nav-link btn btn-outline-info px-4 mt-1" >Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- SHOW CASE -->
		<header class="masthead">
			<div class="primary-overlay text-white">

				<div class="container">

					<div class="intro-text">
					<p id="demo"></p>

						<!-- <div class="intro-lead-in">Welcome To Faculty Evalution!</div> -->
						<div class="intro-heading  display-1">Welcome To Faculty Evaluation</div>
						<a class="btn btn-warning btn-xl text-uppercase text-white"  href="#services">Tell Me More</a>
					</div>
				</div>
			</div>
		</header>
		<!-- ASERVICES -->
		<section id="services" class="text-center">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="info-header mb-5">
							<h1 class="text-dark pb-3 section-heading">
							SERVICES
							</h1>
							<p class="lead pb-3">
								Online Faculty Evaluation for students to evaluate their teachers and for faculties to monitor their performance
							</p>
							
						</div>
						<div class="row text-center ">
							<div class="col-md-4">
								<span class="fa-stack fa-4x">
									<i class="fa fa-circle fa-stack-2x text-warning"></i>
									<i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
								</span>
								<h4 class="service-heading">Students Feedback</h4>
								<p class="text-muted">Educators can identify current strengths and weaknesses, and work harder in the areas that need development.</p>
							</div>
							<div class="col-md-4">
								<span class="fa-stack fa-4x">
									<i class="fa fa-circle fa-stack-2x text-warning"></i>
									<i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
								</span>
								<h4 class="service-heading">Impact of Feedbacks</h4>
								<p class="text-muted">Students can highlight a teacher’s positive aspects, which can fire the teacher’s enthusiasm.</p>
							</div>
							<div class="col-md-4">
								<span class="fa-stack fa-4x">
									<i class="fa fa-circle fa-stack-2x text-warning"></i>
									<i class="fa fa-lock fa-stack-1x fa-inverse"></i>
								</span>
								<h4 class="service-heading">End of Semester Evaluation</h4>
								<p class="text-muted">Teachers will be less likely to become complacent in their work if they know that they will be evaluated regularly.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="faq" class="bg-light">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="info-header mb-5">
								<h1 class="text-dark pb-3 section-heading">
								FAQ
								</h1>
								<p class="lead pb-3">
									Frequently Asked Questions
								</p>
								
							</div>
							
							<div id="accordion" role="tablist">
								<div class="card">
									<div class="card-header" id="heading1">
										<h5 class="mb-0 ">
										<div href="#collapse1" data-toggle="collapse" data-parent="#accordion">
											<a href="" class="link">HOW TO LOGIN</a>
										</div>
										</h5>
									</div>
									<div id="collapse1" class="collapse show">
										<div class="card-body">
											In order to login to your account the default username and password will be your Student ID
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="heading2">
									<h5 class="mb-0 text-center">
									<div href="#collapse2" data-toggle="collapse" data-parent="#accordion">
										<a href="" class="link">HOW DO I KNOW THAT I'M ALRREADY REGISTERED</a>
									</div>
									</h5>
								</div>
								<div id="collapse2" class="collapse">
									<div class="card-body">
										If you cannot sign in using your default ID username and password, go to the guidance office and ask for a guidance councilor for guidance to register your ID number for evaluation. 
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="heading4">
									<h5 class="mb-0 text-center">
									<div href="#collapse4" data-toggle="collapse" data-parent="#accordion">
										<a href="" class="link">HOW DO I KNOW WHEN THE EVALUATION STARTS</a>
									</div>
									</h5>
								</div>
								<div id="collapse4" class="collapse">
									<div class="card-body">
										On the homepage, you will notice a timer that indicates the span of days for evaluation and list of faculty that are active for evaluation.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="heading3">
									<h5 class="mb-0 text-center">
									<div href="#collapse3" data-toggle="collapse" data-parent="#accordion">
										<a href="" class="link">I CANNOT EVALUATE DUE TO EXPIRED SCHEDULE FOR EVALUATION</a>
									</div>
									</h5>
								</div>
								<div id="collapse3" class="collapse">
									<div class="card-body">
										If you forgot to evaluate on the designated schedule, go to guidance office and ask for a guidance councilor for guidance to re-activate your evaluation. 
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
			</section>
			
			
			<!-- ABOUT -->
			<section id="contact" class="bg-light py-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-9">
							<h3>Get In Touch</h3>
							<p class="lead">For further questions, email us through University's email.</p>
							<form>
								<div class="form-group">
									<div class="input-group input-group-lg">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control" placeholder="Name" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-lg">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" class="form-control" placeholder="Email" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-lg">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" placeholder="Message" rows="5" required></textarea>
									</div>
								</div>
								<input type="submit" value="Submit" class="btn btn-warning btn-xl btn-block text-uppercase text-white">
							</form>
						</div>
						<div class="col-lg-3 align-self-center">
							<img src="img/logoFacE.gif" alt="" class="img-fluid">
						</div>
					</div>
				</div>
			</section>
			<!-- footer -->
			<footer id="main-footer" class="py-5 footer text-white">
				<div class="container">
					<div class="row text-center">
						<div class="col-md-6 ml-auto">
							<p class="lead">Copyright &copy; Student Faculty Evaluation 2018</p>
						</div>
					</div>
				</div>
			</footer>
			<script src="js/jquery.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/navbar-fixed.js"></script>
			<script>
				var newCountDownDate = "<?php echo $dateEnd ?>";
				var countDownDate = new Date(newCountDownDate);

				// Set the date we're counting down to
				// Update the count down every 1 second
				var x = setInterval(function() {
				  // Get todays date and time
				  var now = new Date().getTime();
				  // Find the distance between now and the count down date
				  var distance = countDownDate - now;
				  // Time calculations for days, hours, minutes and seconds
				  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				    
				  // Output the result in an element with id="demo"
				  document.getElementById("demo").innerHTML = "Schedule " + days + "d " + hours + "h "
				  + minutes + "m " + seconds + "s ";
				  // If the count down is over, write some text 
				  if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("demo").innerHTML = "No Evaluation Yet";
				  }
				}, 1000);
				</script>

			<script>
			$(document).ready(function() {
				$(window).on("scroll", function() {
					if ($(window).scrollTop() > 100) {
						$(".navbar").addClass("compressed ");
					} else {
						$(".navbar").removeClass("compressed");
					}
				});
			});
			</script>
		</body>
	</html>