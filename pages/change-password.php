<?php  include "../includes/dbconnection.php"; ?>
<?php  include "../includes/functions.php"; ?>

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
  <link rel="stylesheet" href="../css/respomsg.css"/>
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



     <?php
  //     $response="";
  //  if(isset($_POST['change'])) {     
   
  //   $current_pass      = escape($_POST['current_pass']);
  //   $new_pass1         = escape($_POST['new_pass1']);
  //   $new_pass2         = escape($_POST['new_pass1']);
    
  //  $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
          
  //     $query = "INSERT INTO users(user_firstname, user_lastname,username,user_email,user_password,user_role,user_created) ";
             
  //     $query .= "VALUES('{$firstname}','{$lastname}','{$username}','{$email}','{$password}','user',now()) "; 
             
  //     $create_user_query = mysqli_query($connection, $query);  

  //     if(!$create_user_query){
  //       die("QUERY FAILED".mysqli_error($connection));
  //     }
  //      $response="User Succesfully Created";

  //  }
?>
<div class="create-page">
 <?php
  // echo"<b class='response'>$response</b>";
  ?>
<div class="create-form">
<form action="" method="post" enctype="multipart/form-data">  

<!-- <img src="../assets/icons/useravt.JPG"> -->
	<h3>Change your Password</h3> <br>
<input type="password" placeholder="current password" name="current_pass" id="mypass" required="" minlength="6">
<input type="password" placeholder="New password" name="new_pass1" id="mypass" required="" minlength="6">
<input type="password" placeholder="Confirm password" name="new_pass2" id="mypass" required="" minlength="6">
<button type="submit" name="change" >Change</button>
</form>
</div>
</div>
 <!--footer--> 
 <?php  include "includes/footer.php"; ?>
