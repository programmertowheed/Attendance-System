<?php
    ob_start();
    ini_set('display_errors','1');
	include "lib/Session.php";
	Session::init();
	Session::checkLogin();
?>
<?php include "lib/Database.php";?>
<?php include "helpers/Format.php";?>
<?php
	$db = new Database();
	$fm = new Format();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Programmer Towheed, Full Stack Web Developer & Social Entrepreneur">
    <meta name="keywords" content="Entrepreneur,Web Developer, Programmer, Programmer Towheed, Bangladesh, Online Earning, Earn Money online, Bangla Video Tutorial">
    <meta name="author" content="Programmer Towheed">

	<title>Login | Attendance system</title>
	
	<!-- Favicon -->
    <link href="assets/img/favicon.png" rel="icon" type="image/png">

	<!-- bootstrap stylesheet-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	
	<!-- fontawesome stylesheet-->
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	
	<!-- coustom style-->
	<style type="text/css">
		body {
		    font-family: arial;
		    position: relative;
		    background: #58757C;
		}
		
		label {
		    margin-bottom: 0;
		}
		.form-control {
		    display: inline-block;
		}
		.lfrom-inner {
		    padding: 20px;
		    margin: 0px auto;
		    margin-top: 100px;
		    margin-bottom: 100px;
		    border: 1px solid #F98D79;
		    border-radius: 5px;
		    background-color: #0504044d;
		    color: #F9F9F9;
		}
		.lfrom-inner h4.log-text.text-center.mb-4 {
		    font-size: 25px;
		    border-bottom: 2px solid tomato;
		    padding-bottom: 10px;
		    margin: 20px 61px;
		}
		.lfrom-inner .form-group {
		    margin: 10px 0;
		}
		.lfrom-inner label {
		    font-size: 17px;
		    padding: 5px 0;
		}
		.lfrom-inner svg:not(:root).svg-inline--fa {
		    font-size: 16px;
		}
		.lfrom-inner .form-control {
			font-size: 1em;
		}
		.lfrom-inner .tomato{
			background-color:tomato;
			color:#fff;
			border:1px solid #ce7867;
			font-size: 18px;
		    padding: 5px;
		    margin-bottom: 10px;
		}
		.lfrom-inner .tomato:hover{
			background-color:#cf442b;
		}

		.lfrom-inner a{
			color:#52ded2;
		}

		.lfrom-inner a:hover{
			text-decoration: none;
			color:#2abdb1;
		}
		.form-check-input{
			margin-top: 11px;
		}
		@media only screen and (max-width: 992px){
			.lfrom-inner {
			    width: 50% !important;
			}
		}
		
		@media only screen and (max-width: 768px){
			.lfrom-inner {
			    width: 60% !important;
			}
		}

		@media only screen and (max-width: 560px){
			.lfrom-inner {
			    width: 90% !important;
			}
		}

	</style>
	
	
</head>
<body>

<div class="lbgpic">
	<div class="container"> 
		<div class="row">
			<div class="lfrom-inner">
				<?php
					if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
						$employeid = $fm->validation($_POST['employeid']);
						$password  = $fm->validation($_POST['password']);

						if(empty($employeid) || empty($password)){
							echo "<span style='color:red;font-size:18px'>Feild must not be empty!!</span>";
						}elseif(!filter_var($employeid, FILTER_VALIDATE_INT)){
							echo "<span style='color:red;font-size:18px'>Invalid Employe ID!!</span>";
						}else{
							$useremployeid = md5(sha1($employeid));
							$userpass      = md5(sha1($password));
							$auth          = md5(sha1($userpass.$useremployeid));

							$query = "SELECT * FROM tbl_user WHERE employeid='$employeid' && userPass='$userpass' && auth='$auth' ";
							$result = $db->select($query);
							if($result != false){
								$value = mysqli_fetch_array($result);
								$row   = mysqli_num_rows($result);
								if($row > 0){
									Session::set("attuserlogin", true);
									Session::set("attuserauth", $value['auth']);
									Session::set("attuseremployeid", $value['employeid']);
									Session::set("attuserId", $value['id']);
									header("Location:index.php");
								}else{
									echo "<span style='color:red;font-size:18px'>Result not found!</span>";
								}
							}else{
								echo "<span style='color:red;font-size:18px'>Employe ID or Password not matched!!</span>";
							}
						}

					}
				?>

				<form action="login.php" method="post">
					<h4 class="log-text text-center mb-4">Log In</h4>
				  <div class="form-group">
					<label for="employeid"><i class="fas fa-envelope mr-2"></i>Employe ID</label>
					<input type="text" class="form-control" id="employeid" name="employeid" placeholder="Enter employe ID">
					<!--<span style='color:red;font-size:18px;display:block'>Feild must not be empty!!</span>-->
				  </div>
				  <div class="form-group">
					<label for="password"><i class="fas fa-key mr-2"></i>Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					<!--<span style='color:red;font-size:18px;display:block'>Feild must not be empty!!</span>-->
				  </div>

				  
	               <div class="form-group">
	               	<div class="form-check">
		               	<input type="checkbox" class="form-check-input" id="remember" name="remember" >
						<label for="remember" class="form-check-label">Remember Me</label>
					</div>
				  </div>

				  <div class="text-center">
					<button type="submit" class="btn col-6 tomato" name="submit" >Log in</button>
				  </div>
				  <div class="form-group fgbutton  mb-0">
					<a class="" href="password/forgetpass.php">Forget Password?</a>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>


	<!-- jQuery library -->
  	<script src="assets/vendor/jquery/jquery.min.js"></script>

	<!-- bootstrap library -->
  	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Latest bootstrap JavaScript -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- fontawesome file-->
	<script src="assets/vendor/fontawesome-free/js/fontawesome.min.js"></script>


</body>	
</html>