<?php session_start(); ?>
<?php  include "../includes/dbconnection.php"; ?>
<?php 
if(isset($_POST['login'])) {

	$username=$_POST['username'];
   $password=$_POST['password'];

	 $username=mysqli_real_escape_string($connection,$username);
	 $password=mysqli_real_escape_string($connection,$password);



	 $query="SELECT * FROM users WHERE username='{$username}' ";
	 $select_user_query=mysqli_query($connection,$query);
	 if(!$select_user_query){
	 	die("QUERY FAILED".mysqli_error($connection));
	 }
	 while($row=mysqli_fetch_array($select_user_query)){
    $db_user_id=$row['user_id'];
		$db_user_firstname=$row['user_firstname'];
    $db_user_lastname=$row['user_lastname'];
    $db_username=$row['username'];
    $db_user_email=$row['user_email'];
    $db_user_role=$row['user_role'];
    $db_user_profile=$row['user_profile'];
    $db_user_password=$row['user_password'];
 }

if(password_verify($password,$db_user_password)){
$_SESSION['user_id'] = $db_user_id;
$_SESSION['username']=$db_username;
$_SESSION['email']=$db_user_email;
$_SESSION['firstname']=$db_user_firstname;
$_SESSION['lastname']=$db_user_lastname;
$_SESSION['user_role']=$db_user_role;
$_SESSION['user_profile']=$db_user_profile;

header("Location: ../admin");
}

else{
   header("Location: ./login");
}
}
?>
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
  <link rel="stylesheet" href="../css/login.css"/>    
</head>
<body>
            <nav>
                <div class="hamburger">
                  <div class="line"></div>
                  <div class="line"></div>
                  <div class="line"></div>
                </div>
                <div class="logo">
                  <a href="../index"> <img src="../assets/images/team.png"></a>
                   </div>
                <ul class="nav-links">
                  <!-- <li><a href="./login.php">Logout</a><li>  -->
                </ul>
              </nav>			

   <div class="login-page">

	<div class="login-form">
  <form action="" method="post" enctype="multipart/form-data">

	<!-- <img src="../assets/icons/useravt.JPG"> -->
	<h3>Enter your credentials to log in</h3><br>
	<input type="text"name="username"placeholder="Enter your Username" required="">
	<input type="password"name="password"placeholder="Enter your Password" required="" minlength="6">
	<p>Not yet Registered? <a href="./register"> &nbsp;&nbsp;&nbsp;<u>Sign Up</u></a></p>

  <button type="submit" name="login" >Login</button><br><br>

 <a href="./change-password.php "><u>Forget Password</u></a>
	</form>
   </div>
	</div>

 <!--footer--> 
 <?php  include "includes/footer.php"; ?>
 