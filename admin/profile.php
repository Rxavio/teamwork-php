<?php  include "includes/header.php";?>	

 <div class="create-page">
<div class="create-form">
<!-- <form class="login-action" action="./login.php" autocomplete="on"> -->

<form action="" method="post" enctype="multipart/form-data">  
  <h3>Profile User account</h3> <br>

<input type="text"name="user_firstname" required="" value="Smith">
<input type="text" name="user_lastname"required="" value="John">
<input type="email" name="user_email" required="" value="johnsmith01@gmail.com">


<select name="user_role">
  <option value="user">User</option>
</select>
 <label class="lblphoto" for="photo">Upload Profile</label>
   <input type="file" name="image" id="image">
            <img src="./assets/kendal.png">


<input type="password" name="user_password"required="" minlength="6" value="123456">

<button type="submit" name="sign-up" >Update User</button>
</form>

</div>
</div>


</div>
</div>
</div>

<!-- Footer-->
<?php  include "includes/footer.php";?>	




         
















