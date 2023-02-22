<?php
session_start();
include "includes/DBConfig.php";
include "includes/auth.php";

$loginUser = new  auth();

if(isset($_POST['submit']))
{
    //set login attempt if not set
	if(!isset($_SESSION['attempt']))
    {
	    $_SESSION['attempt'] = 0;
	}
    $user_name = $_POST['email'];
    $user_pass = $_POST['password'];
    // calling the login user function from the UserController Class
    $loginUser->login($user_name, $user_pass);
}
?>
<!DOCTYPE HTML>
<html>
	<head>
    <title>Online Birth / Death Registration System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">
			 <section id="main" class="container medium">
					<div class="box">
					<section class="box special">
                	<header>
						<h4>Online Birth / Death Registration System</h4>
						<p>To access the system, please identify yourself by providing the information requested in the fields below.</p>
					</header>
					</section>
				 
						<form method="post">
								<div class="form-group">
									Email: <input type="email" name="email" id="email" value="" placeholder="Email" required/>
									<br>
								</div>

								<div class="form-group">
                                   Password: <input type="password" name="password" id="password" value="" placeholder="Password" required/>
								</div>

								<div class="form-group">
								<br>
									<ul class="actions special">
										<li><input type="submit" name="submit" value="Login"/></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>