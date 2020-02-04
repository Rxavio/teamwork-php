<?php  include "includes/header.php";?>	
<?php  include "../includes/functions.php"; ?>


<?php
   
   $msg="";

   if(isset($_POST['sign-up'])) {
          
    $firstname    = escape($_POST['user_firstname']);
    $lastname     = escape($_POST['user_lastname']);
    $email        = escape($_POST['user_email']);
    $user_role    = escape($_POST['user_role']);
    $password     = escape($_POST['user_password']);
    $user_profile      = escape($_FILES['image']['name']);
    $user_created      = escape(date('d-m-y'));
    
   $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
        
     $target="../pages/images/".basename($_FILES['image']['name']); 

      $query = "INSERT INTO users(user_firstname, user_lastname,user_email,user_password,user_role,user_profile,user_created) ";
             
      $query .= "VALUES('{$firstname}','{$lastname}','{$email}','{$password}','user','{$user_profile}',now() ) "; 
             
      $create_user_query = mysqli_query($connection, $query);  

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg="uploaded well";
    }else{
        $msg="error in uploading";
    }

      if(!$create_user_query){
        die("QUERY FAILED".mysqli_error($connection));
      }

       echo "<p>User Created</p>"; 

   }
?>





 <div class="create-page">
<div class="create-form">
<!-- <form class="login-action" action="./login.php" autocomplete="on"> -->

<form action="" method="post" enctype="multipart/form-data">  

  <h3>Create account</h3> <br>

<input type="text"placeholder="Firstname" name="user_firstname" required="">
<input type="text" placeholder="Lastname" name="user_lastname"required="">
<input type="email" placeholder="Email" name="user_email" required="">
<select name="user_role">
  <option value="user">Select Options</option>
  <option value="admin">Admin</option>
  <option value="user">User</option>
</select>
 <label class="lblphoto" for="photo">Upload Profile</label>
  <input type="file"name="image">  
<input type="password" placeholder="password" name="user_password"required="" minlength="6">

<button type="submit" name="sign-up" >Create User</button>
</form>

</div>
</div>


</div>
</div>
</div>

<!-- Footer-->
<?php  include "includes/footer.php";?>	






         
















