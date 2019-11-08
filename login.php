<?php
		include('connection.php');
		if (isset($_POST['proceed'])) {
			session_start();
				$username = $conn->real_escape_string($_POST['login']);
				$password = $conn->real_escape_string($_POST['password']);
				/***** GUIDANCE *****/
				$guidance = "SELECT * FROM faculty WHERE Faculty_ID = '$username' AND Password = '$password' AND Position='GUIDANCE' ";
				$result = $conn->query($guidance);
				/***** TEACHER *****/
				
				$teacher = "SELECT * FROM faculty WHERE Faculty_ID = '$username' AND Password = '$password' AND Position='TEACHER'";
				$result1 = $conn->query($teacher);
				/***** STUDENTS *****/
				
				$student = "SELECT * FROM student WHERE Student_ID = '$username' AND Password = '$password' ";
				$result2 = $conn->query($student);

				$dean = "SELECT * FROM faculty WHERE Faculty_ID = '$username' AND Password = '$password' AND Position = 'DEAN'";
				$result3 = $conn->query($dean);


				if ($result -> num_rows > 0) {
					
					$row = $result -> fetch_object();
						if($row->Status!='Active'){
							$inactive = 1;
							}else{
							$_SESSION['access'] = 1;
							$_SESSION['Faculty_ID'] = $row -> Faculty_ID;
							$_SESSION['Faculty_Firstname'] = $row -> Faculty_Firstname;
							header('Location: admin/guidance/index.php');
						}
								}elseif ($result1 -> num_rows > 0) {
									$row = $result1 -> fetch_object();
										if($row->Status!='Active'){
								$inactive = 1;
								}else{
									$_SESSION['Faculty_ID'] = $row -> Faculty_ID;
									$_SESSION['Faculty_Firstname'] = $row -> Faculty_Firstname;
									header('Location: admin/faculties/index.php');
								}
						}elseif ($result3 -> num_rows > 0) {
									$row = $result3 -> fetch_object();
										if($row->Status!='Active'){
								$inactive = 1;
								}else{
									$_SESSION['Faculty_ID'] = $row -> Faculty_ID;
									// $_SESSION['Firstname'] = $row -> Firstname;
									header('Location: admin/dean/index.php');
								}
						}

						 elseif ($result2 -> num_rows > 0) {
									$row = $result2 -> fetch_object();
									$_SESSION['access'] = 3;
									$_SESSION['Student_ID'] = $row -> Student_ID;
									//$_SESSION[] = $row ->
									header('Location:student/index.php ');
					}else{
								$error = 1;
				}
				}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Face: Faculty Evaluation System</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Jerico C. Borja">
		<link rel="icon" href="img/logoFacE.gif">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body id="home" class="bg-light">
		
		<section id="login">
			<div class="container">
				<div class="row">
					<div class="col-md-6 mx-auto">
						<div class="card ">
							<div class="card-header bg-white ">
								<h4 class="text-center">Faculty Evaluation</h4>
							</div>
							
							<div class="card-body bg-light">

								<div class="alert alert-danger collapse hide  <?php if(isset($error)) echo 'show';?>">
									<strong>Invalid username/password! </strong>Email administrator to recover it.
								</div>
								<div class="alert alert-warning collapse hide <?php if(isset($inactive)) echo 'show';?>">
									This account is <strong>no longer valid</strong>. Thank you!
								</div>

								<form method="post">
									<div class="form-group">
										<label for="email">ID:</label>
										<input type="text" class="form-control " placeholder="ID" name="login" required>

										
									</div>
									<div class="form-group">
										<label for="password">Password:</label>
										<input type="password" class="form-control" placeholder="Password" name="password" required>
									</div>
									<input type="submit" class="btn btn-warning text-white btn-block" value="Sign In" name="proceed" >
								</form>
							</div>
							<div class="card-footer bg-transparent text-center"><a href="index.php">Back to Site</a></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/navbar-fixed.js"></script>
	</body>
</html>