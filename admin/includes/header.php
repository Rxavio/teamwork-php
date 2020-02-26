<?php ob_start(); ?>
<?php include "../includes/dbconnection.php"; ?>
<?php session_start(); ?>
<?php 

if(!isset($_SESSION['user_role'])) {

  header("Location:../pages/login.php");

    }

 if(isset($_SESSION['user_role'])) {

     if($_SESSION['user_role']!=='admin'){
        header("Location:../pages/index.php");
    }	
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Html,css and javascript Dashboard"/>
     <meta name="author" content="Xavio"/>
   <title>TEAMWORK</title>
    <link rel="stylesheet" href="./css/topside.css">  
    <link rel="stylesheet" href="./css/write-article.css">
     <link rel="stylesheet" href="./css/card.css">
     <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/make.css"> 
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
        <header>
                <div class="logo">
                   <a href="../pages"><img src="./assets/team.png"></a>
                     <p><b>Users Online: 44 </b></p>
                </div>

                <ul class="menu-ctn">
                 <li id="menu">
                <img src="./assets/pi.jpg">
                      <ul  id="dropdown">
                      <li><a href="">Xavio</a></li>
                      <li><a href="./profile.php">Profile</a></li>
                      <li><a href="../pages/logout.php">Log Out</a></li>
                    </ul>
                  </li>
                </ul>
            
              </header>
                <div id="sidebar">
            
                  <nav>
                    <ul>
        <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="viewposts.php"><i class="fas fa-address-card"></i> View Posts</a></li>
            <li><a href="addpost.php"><i class="fas fa-address-card"></i> Add post</a></li>
            <li><a href="comments.php"><i class="fas fa-project-diagram"></i> Comments</a></li>
            <li><a href="viewusers.php"><i class="fas fa-blog"></i> View Users</a></li>
            <li><a href="adduser.php"><i class="fas fa-blog"></i> Add User</a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>            
            </ul>
                  </nav>
            
                  <div id="sidebar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>

                </div>

    <div class="container">