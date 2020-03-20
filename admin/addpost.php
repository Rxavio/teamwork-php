<?php  include "includes/header.php";?>	

<?php
$msg="";
$response="";
 if(isset($_POST['create_post'])) {
  $post_author = escape($_POST['post_author']);
  $post_title = escape($_POST['post_title']);
  $post_image = escape($_FILES['image']['name']);
  $post_content =escape($_POST['post_content']);
  $post_date = escape(date('d-m-y'));
 
  $target="../pages/images/".basename($_FILES['image']['name']); 
    $query = "INSERT INTO posts(post_author,post_title,post_date,post_image,post_content)  ";
           
    $query .= "VALUES('{$post_author}','{$post_title}',now(),'{$post_image}','{$post_content}') "; 
           
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
    <div class="article-form">
    <form action="" method="post" enctype="multipart/form-data"autocomplete="on">
        <h3>Add a Post</h3><br>

    <input type="text"placeholder="Article Title" name="post_title" required="" minlength="6" >

    <input type="text" placeholder="Post Author" name="post_author">
    
      <label class="lblphoto" for="photo">Upload Image</label>
    <input type="file"name="image" id="image">

<textarea name="post_content" rows="10" cols="50" placeholder="write your article..." required="" minlength="30" ></textarea>

        <button type="submit" name="create_post" >Post article</button>
        </form>
    </div>
    </div>



<?php  include "includes/footer.php";?>	



         





















