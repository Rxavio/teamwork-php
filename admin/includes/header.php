<?php ob_start(); ?>
<?php include "../includes/dbconnection.php"; ?>
<?php  include "../includes/functions.php"; ?>

<?php session_start(); ?>
<?php 

if(!isset($_SESSION['user_role'])) {

  header("Location:../pages/login");

    }

 if(isset($_SESSION['user_role'])) {

     if($_SESSION['user_role']!=='admin'){
        header("Location:../user");
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
   <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="./css/topside.css">  
    <link rel="stylesheet" href="./css/write-article.css">
     <link rel="stylesheet" href="./css/card.css">
     <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/make.css"> 
    <link rel="stylesheet" href="./css/option.css"> 
    <link rel="stylesheet" href="./css/profile.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
      function printUserTable(el){
      let restorepage = document.body.innerHTML;
      let printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
      }
</script>
</head>
<body>
        <header>
                <div class="logo">
                 <a href="../pages"><img src="./assets/team.png"></a>
                 <p><b>Users Online: 44 </b></p>
                </div>

                <ul class="menu-ctn">
                 <li id="menu">
                 <?php if(isset($_SESSION['user_profile'])): ?>                                           
                <img src="../pages/images/<?php echo $_SESSION['user_profile'] ?>">
                <?php endif; ?>

                      <ul  id="dropdown">
                      <?php if(isset($_SESSION['user_role'])): ?>                       
                      <li><a href=""><?php echo $_SESSION['username'] ?></a></li>
                      <?php endif; ?>

                      <li><a href="./profile">Profile</a></li>
                      <li><a href="../pages/logout.php">Log Out</a></li>
                    </ul>
                  </li>
                </ul>
            
              </header>
                <div id="sidebar">
            
                  <nav>
                    <ul>
            <li><a href="index"><i class="fas fa-home"></i> My Data</a></li>
            <?php if(is_admin()): ?>
            <li><a href="dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
            <?php endif ?>
            <li><a href="viewposts"><i class="fas fa-address-card"></i> View Posts</a></li>
            <li><a href="addpost"><i class="fas fa-address-card"></i> Add post</a></li>
            <li><a href="comments"><i class="fas fa-project-diagram"></i> Comments</a></li>
            
            <?php if(is_admin()): ?>
            <li><a href="viewusers"><i class="fas fa-blog"></i> View Users</a></li>
            <li><a href="adduser"><i class="fas fa-blog"></i> Add User</a></li>
            <?php endif ?>
            <li><a href="profile"><i class="fas fa-user"></i> Profile</a></li>            
            </ul>
                  </nav>
            
                  <div id="sidebar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>

                </div>

    <div class="container">