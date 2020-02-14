<?php ob_start(); ?>
<?php include "../includes/dbconnection.php"; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEAMWORK</title> 
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
  <link href='https://fonts.googleapis.com/css?family=Crimson Text' rel='stylesheet'>
   <link rel="stylesheet" href="../css/nav.css"/>
  <link rel="stylesheet" href="./css/style.css"/>
  <link rel="stylesheet" href="./css/respo.css"/>
  <link rel="stylesheet" href="./css/comment.css"/>
  <!-- <link rel="stylesheet"href="./css/view-articles.css"/>  -->
	<!-- <link rel="stylesheet" href="../css/comment.css"/> -->
  <link rel="stylesheet" href="../css/edit-article.css"/>
  <link rel="stylesheet" href="../css/reason.css"/>
  <link rel="stylesheet" href="../css/reasoncomment.css"/>
 <link rel="stylesheet" href="../css/update.css"/>
 <link rel="stylesheet" href="../css/write-article.css"/>
  <link rel="stylesheet" href="../css/admin.css"/>
  <link rel="stylesheet" href="../css/main.css"/>
  <link rel="stylesheet" href="../css/responsive.css"/>
     
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
  <li><a href="./index.php">All Posts</a></li>
  <li><a href="../admin">Admin Area</a></li>

  <li><a href="./logout.php">Logout</a><li>
</ul>
</nav>			