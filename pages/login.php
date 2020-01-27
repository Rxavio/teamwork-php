<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEAMWORK</title> 
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
  <link href='https://fonts.googleapis.com/css?family=Crimson Text' rel='stylesheet'>
  <link rel="stylesheet" href="../css/index.css"/>
  <link rel="stylesheet" href="../css/main.css"/>
  <link rel="stylesheet" href="../css/responsive.css"/>
	<link rel="stylesheet" href="../css/nav.css"/>
  <link rel="stylesheet" href="./css/login.css"/>
        
     
</head>

<body>
            <nav>
                <div class="hamburger">
                  <div class="line"></div>
                  <div class="line"></div>
                  <div class="line"></div>
                </div>
                <div class="logo">
                  <a href="../index.php"> <img src="../assets/images/team.png"></a>
                   </div>
                <ul class="nav-links">
                  <!-- <li><a href="./login.php">Logout</a><li>  -->
                </ul>
              </nav>			
<!--header-->

<div class="login-page">

	<div class="login-form">
	<form class="login-action" action="./view-articles.php" autocomplete="off">	
	<img src="../assets/icons/useravt.JPG">
	<h3>Enter your credentials to log in</h3><br>
	<input type="email" placeholder="Enter your Email" required="">
	<input type="password" placeholder="Enter your Password" required="" minlength="6">
	<p>Not yet Registered? <a href="./register.php"> &nbsp;&nbsp;&nbsp;<u>Sign Up</u></a></p>
	<button>Login</button>
	</form>

           </div>
		</div>
 <!--footer--> 

 <?php  include "includes/footer.php"; ?>
 