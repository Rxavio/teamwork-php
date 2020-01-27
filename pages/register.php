<?php  include "../includes/dbconnection.php"; ?>

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
  <link rel="stylesheet" href="../css/create.css"/>
        
     
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



              <?php
   

   if(isset($_POST['sign-up'])) {
          
    $firstname    = $_POST['user_firstname'];
    $lastname     = $_POST['user_lastname'];
    $email        = $_POST['user_email'];
    $password     = $_POST['user_password'];
    
    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
          
      $query = "INSERT INTO users(user_firstname, user_lastname,user_email,user_password) ";
             
      $query .= "VALUES('{$firstname}','{$lastname}','{$email}','{$password}') "; 
             
      $create_user_query = mysqli_query($connection, $query);  

      if(!$create_user_query){
        die("QUERY FAILED".mysqli_error($connection));
      }

      //  echo "<p>User Created</p>"; 

   }
?>

<!--header-->
<div class="create-page">
<div class="create-form">
<!-- <form class="login-action" action="./login.php" autocomplete="on"> -->

<form action="" method="post" enctype="multipart/form-data">  

<img src="../assets/icons/useravt.JPG">
	<h3>Create your own account</h3> <br>

<input type="text"placeholder="Firstname" name="user_firstname" required="">
<input type="text" placeholder="Lastname" name="user_lastname"required="">
<input type="email" placeholder="Email" name="user_email" required="">
<input type="password" placeholder="password" name="user_password"required="" minlength="6">



<p>Already Registered?<a href="./login.php">&nbsp;&nbsp;&nbsp;<u>Login</u></a></p>

<button type="submit" name="sign-up" >sign up</button>
</form>

</div>
</div>

 <!--footer--> 
  
 <?php  include "includes/footer.php"; ?>
