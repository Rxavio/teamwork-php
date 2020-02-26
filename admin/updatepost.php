<?php  include "includes/header.php";?>	
<?php  include "../includes/functions.php"; ?>

<?php
//display in the field
  if(isset($_GET['p_id'])) {
  $the_post_id = escape($_GET['p_id']);

$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_post_by_id = mysqli_query($connection,$query);  

while($row = mysqli_fetch_assoc($select_post_by_id)) {
  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title =$row['post_title'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
}
 } 
?>

<?php
$msg="";
$response="";
//update the field
if(isset($_POST['update_post'])) {
   
    $post_title =escape($_POST['post_title']);
    $post_author =escape($_POST['post_author']);
    $post_image = escape($_FILES['image']['name']);
    $post_content = escape($_POST['post_content']);

    $target="../pages/images/".basename($_FILES['image']['name']); 

    if(empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $post_image = $row['post_image'];
        }       
      }

    $query = "UPDATE posts SET ";
    $query .="post_title  = '{$post_title}', ";
    $query .="post_author  = '{$post_author}', ";
    // $query .="post_date   =  now(), ";
    $query .="post_content= '{$post_content}', ";
    $query .="post_image  = '{$post_image}' ";
    $query .= "WHERE post_id = {$the_post_id} ";
  
  $update_post = mysqli_query($connection,$query);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg="uploaded well";
}else{
    $msg="error in uploading";
}
   
  confirmQuery($update_post);  
  $response="Post updated well";

}
?>

 <div class="create-page">
 <?php
  echo"<b class='response'>$response</b>";
  ?>
<div class="create-form">
<form action="" method="post" enctype="multipart/form-data">  
  <h3>Update post</h3> <br>

<input type="text"name="post_title" required="" value="<?php echo $post_title; ?>">
<input type="text" name="post_author"required="" value="<?php echo $post_author; ?>">

 <label class="lblphoto" for="photo">Upload Profile</label>
   <input type="file" name="image" id="image"><br>
   <img width="100" src="../pages/images/<?php echo $post_image; ?>" alt="">
   <br> <br> <br>    <br>  
   
 

 <textarea class="ckeditor" name="post_content" rows="10" cols="50"  required="" minlength="3">
   <?php echo $post_content; ?> </textarea><br>
<button type="submit" name="update_post" >Update post</button>
</form>

</div>
</div>

<!-- Footer-->
<?php  include "includes/footer.php";?>	







         
















