<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" >
<!--===============================================================================================-->
<style>
  	.error{
    	color: red;
        font-style: italic;
    }
  </style>
</head>


<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/expense.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Sign Up
				</span>
				<form action="php/signup.php" method = "post" class="login100-form validate-form p-b-33 p-t-5" id = "registration">
				<?php
				/* If email is taken wrong, print a danger alert that tells "email is already taken"*/
				if (!empty($_SESSION["flash"])){
				?>
				<div class="alert alert-danger" role="alert">
				<?php
			
                    $x = $_SESSION["flash"];
					echo $x;
					$_SESSION["flash"] = "";
				?>
			</div>
			<?php
			}
			?>
			
					<!--Enter Email-->
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<!--Enter Password-->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input id ="password" class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<!--Confirm Password-->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="confirmPassword" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<!--Press Create acount to continue-->
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Create Acount
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<script src="js/register.js"></script>

</body>
</html>