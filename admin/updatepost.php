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

 <div class="create-page">
<div class="create-form">
<form action="" method="post" enctype="multipart/form-data">  
  <h3>Update post</h3> <br>

<input type="text"name="post_title" required="" value="<?php echo $post_title; ?>">
<input type="text" name="post_author"required="" value="<?php echo $post_author; ?>">

 <label class="lblphoto" for="photo">Upload Profile</label>
   <input type="file" name="image" id="image">
   <img width="100" src="../pages/images/<?php echo $post_image; ?>" alt="">

 <textarea name="post_content" rows="10" cols="50"  required="" minlength="3">
     <?php echo $post_content; ?>
            </textarea>

<button type="submit" name="update_post" >Update post</button>
</form>

</div>
</div>


</div>
</div>
</div>

<!-- Footer-->







         
















