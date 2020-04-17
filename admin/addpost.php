<?php  include "includes/header.php";?>	

<?php
$msg="";
$response="";
 if(isset($_POST['create_post'])) {

  $post_user_id = escape($_POST['post_user']);
  $post_author = escape($_POST['post_author']);
  $post_title = escape($_POST['post_title']);
  $post_image = escape($_FILES['image']['name']);
  $post_content =escape($_POST['post_content']);
  $post_status =escape($_POST['post_status']);
  $post_date = escape(date('d-m-y'));
 
  $target="../pages/images/".basename($_FILES['image']['name']); 
    $query = "INSERT INTO posts(post_user_id,post_author,post_title,post_date,post_image,post_content,post_status)  ";
           
    $query .= "VALUES({$post_user_id},'{$post_author}','{$post_title}',now(),'{$post_image}','{$post_content}', '{$post_status}') "; 
           
    $create_post_query = mysqli_query($connection, $query);


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg="uploaded well";
  }else{
      $msg="error in uploading";
  }
    
  confirmQuery( $create_post_query);

  $response="Post Succesfully Added";

 }

  ?>
 <div class="create-page">
     <?php
   echo"<b class='response'>$response</b>";
   ?>
    <!-- <div class="article-form"> -->
    <div class="create-form">
    <form action="" method="post" enctype="multipart/form-data"autocomplete="on">
        <h3>Add a Post</h3><br>

    <input type="text"placeholder="Article Title" name="post_title" required="" minlength="6" >

    <select name="post_user"style="display:none">
   <!-- <option value="user">Select Options</option>
   <option value="admin">Admin</option>
    <option value="user">User</option> -->
    <?php

        $query_user = "SELECT * FROM users WHERE user_id=".loggedInUserId()."";
        $select_users = mysqli_query($connection,$query_user);
        
        confirmQuery($select_users);

        while($row = mysqli_fetch_assoc($select_users )) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        echo "<option value={$user_id}>{$username}</option>";
                     
        }

?>
   </select>


   <select name="post_author" style="display:none">
  <!-- <option value="user">Select Options</option>
  <option value="admin">Admin</option>
  <option value="user">User</option> -->
  <?php
        $query_user = "SELECT * FROM users WHERE user_id=".loggedInUserId()."";
        $select_users = mysqli_query($connection,$query_user);
        
        confirmQuery($select_users);

        while($row = mysqli_fetch_assoc($select_users )) {
        //$user_id = $row['user_id'];
        $username = $row['username'];
        echo "<option value={$username}>{$username}</option>";
                     
        }
   ?>  
   </select>

    <!-- <input type="hidden" placeholder="Post Author" name="post_author"> -->
    
      <label class="lblphoto" for="photo">Upload Image</label>
    <input type="file"name="image" id="image">

<textarea name="post_content" rows="10" cols="50" placeholder="write your article..." required="" minlength="30" ></textarea>

<select name="post_status">
   <option value="">Status</option>
   <option value="draft">Draft</option>
   </select>

        <button type="submit" name="create_post" >Post article</button>
        </form>
    </div>
    </div>



<?php  include "includes/footer.php";?>	



         





















