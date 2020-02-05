<?php  include "includes/header.php";?>	
<?php  include "../includes/functions.php"; ?>

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


 <div class="create-page">
<div class="create-form">
<h1 class="page-header">                          
<form action="" method="post" enctype="multipart/form-data">     
  <h3>Profile User account</h3> <br>
  <label class="lblphoto" for="photo">Firstname</label>
  <input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname">

  <label class="lblphoto" for="photo">lastname</label>
  <input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname">

  <label class="lblphoto" for="photo">username</label>
  <input type="text" value="<?php echo $username; ?>" name="username">

  <label class="lblphoto" for="photo">Email</label>
  <input type="email" value="<?php echo $user_email; ?>" name="user_email">

  <label class="lblphoto" for="photo">User Role</label>
  <select name="user_role">
   <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
  </select>

 <label class="lblphoto" for="photo">Upload Profile</label>
    <input  type="file" name="image">
      <img width="100" src="../pages/images/<?php echo $user_profile; ?>" alt=""></br></br></br></br>

 <label class="lblphoto" for="photo">Password</label>
<input type="password" value="<?php echo $user_password; ?>"name="user_password">

<button type="submit" name="update_profile" >Update User</button>

</form>

</div>
</div>


</div>
</div>
</div>

<!-- Footer-->
<?php  include "includes/footer.php";?>	




         
















