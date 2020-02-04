<?php ob_start(); ?>
<?php include "../includes/dbconnection.php"; ?>
<?php session_start(); ?>
<?php 

if(!isset($_SESSION['user_role'])) {

    header("Location:../index.php");

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
	<title>TEAMWORK</title>
  <link rel="icon" type="image/png" href="../assets/images/favicon.png">
	<link rel="stylesheet" href="./css/sidemenu.css">
  <link rel="stylesheet" href="./css/write-article.css">
  <link rel="stylesheet" href="./css/create.css">
  <link rel="stylesheet" href="./css/updatepost.css">
  <link rel="stylesheet" href="./css/profile.css">
  <link rel="stylesheet" href="./css/admin.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/responsive.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h3>Admin Area</h3>
        <ul>
        <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="viewposts.php"><i class="fas fa-address-card"></i> View Posts</a></li>
            <li><a href="addpost.php"><i class="fas fa-address-card"></i> Add post</a></li>
            <li><a href="comments.php"><i class="fas fa-project-diagram"></i> Comments</a></li>
            <li><a href="viewusers.php"><i class="fas fa-blog"></i> View Users</a></li>
            <li><a href="adduser.php"><i class="fas fa-blog"></i> Add User</a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href=""><i class="fas fa-map-pin"></i> Logout</a></li>
           
        </ul> 
      </div>

        <div class="main_content">

        <div class="header">
             <b>Users Online: 44 </b> 
             <a href="../pages/index.php">Home</a>
             <a href="../pages/logout.php">Logout</a>
        </div> 

        <div class="info">