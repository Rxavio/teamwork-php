<?php  include "includes/header.php";?>	


<?php

if(isset($_SESSION['username'])) {
    
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_profile_query = mysqli_query($connection, $query);    
    while($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_password= $row['user_password'];
        $user_profile = $row['user_profile'];
        $user_role= $row['user_role'];
    }
}
 ?>
<?php 

$msg="";
$response="";

//update the field
if(isset($_POST['update_profile'])) {
  
    $user_firstname   = escape($_POST['user_firstname']);
    $user_lastname    = escape($_POST['user_lastname']);
    $username         = escape($_POST['username']);
    $user_email       = escape($_POST['user_email']);
    $user_role        = escape($_POST['user_role']); 
    $user_password    = escape($_POST['user_password']);
    $user_profile     = escape($_FILES['image']['name']);
   
    $target="../pages/images/".basename($_FILES['image']['name']); 

    if(empty($user_profile)) {
        
        $query = "SELECT * FROM users WHERE user_id = $user_id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $user_profile = $row['user_profile'];
        }        
      }
    if(!empty($user_password)) { 

        $query_password = "SELECT user_password FROM users WHERE user_id = $user_id";
        $get_user_query = mysqli_query($connection, $query_password);
        // if(!$get_user_query){
        //   die("QUERY FAILED".mysqli_error($connection));
        // }
      confirmQuery($get_user_query);

        $row = mysqli_fetch_array($get_user_query);

        $db_user_password = $row['user_password'];


      if($db_user_password != $user_password) {

          $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        }
        $query = "UPDATE users SET ";
        $query .="user_firstname  = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="username = '{$username}', ";
        $query .="user_email = '{$user_email}', ";
        $query .="user_role   =  '{$user_role}', ";
        $query .="user_profile   =  '{$user_profile}', ";
        $query .="user_password   = '{$hashed_password}' ";
        $query .= "WHERE username = '{$username}' ";
  
       $update_user = mysqli_query($connection,$query);

       if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg="uploaded well";
        }else{
            $msg="error in uploading";
        }
   
        confirmQuery($update_user);
        // if(!$update_user){
        //   die("QUERY FAILED".mysqli_error($connection));
        // }      
      $response="Profile updated well";

}
}
?>
 <div class="create-page">
 <?php
  echo"<b class='response'>$response</b>";
  ?>
<div class="create-form">
<h1 class="page-header">                          
<form action="" method="post" enctype="multipart/form-data">     
  <h3>Profile User account</h3> <br>
 
  <label class="lblphoto" for="photo">Firstname</label>
  <input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname"required="">

  <label class="lblphoto" for="photo">lastname</label>
  <input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname"required="">

  <label class="lblphoto" for="photo">username</label>
  <input type="text" value="<?php echo $username; ?>" name="username"required="">

  <label class="lblphoto" for="photo">Email</label>
  <input type="email" value="<?php echo $user_email; ?>" name="user_email"required="">

  <label class="lblphoto" for="photo">User Role</label>
  <select name="user_role">
   <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
  </select>

 <label class="lblphoto" for="photo">Upload Profile</label>
    <input  type="file" name="image">
      <img width="100" src="../pages/images/<?php echo $user_profile; ?>" alt=""></br><br></br>

 <label class="lblphoto" for="photo">Password</label>
<input type="password" value="<?php //echo $user_password; ?>"name="user_password"required="">

<button type="submit" name="update_profile" >Update User</button>

</form>

</div>
</div>
<?php  include "includes/footer.php";?>	




         
















