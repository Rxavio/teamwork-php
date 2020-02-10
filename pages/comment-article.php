<?php  include "includes/header.php"; ?>

    <!-- comment an article-->
    <div class="comment-article-page">

        <div class="comment-form">
        
         <h3>Feel Free To Write a Comment</h3> 

         
<?php

$query = "SELECT * FROM posts ORDER BY post_id DESC ";
$select_all_posts_query = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_all_posts_query)) {
$post_id = $row['post_id'];
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content = $row['post_content'];
//}
 ?>

         
<!-- comment articles-->
<div class="info-card">
    <h4><?php echo $post_title ?></h4>
    <hr>
    <br>
    <img src="./images/<?php echo $post_image;?>">
    <p><?php echo $post_content ?></p>  
    <h5 class="author">By <?php echo $post_author ?> <i class="date"><?php echo $post_date ?></i></h5>

    <a href="./comment-article.php">
    <i class="comment-articles"><img src="../assets/fonts/comment-solid.svg" class="icon"/></i>
    </a>

</div>



<div class="comment">
  <form class="comment-action" action="./comment-article.php">

 <div class="comment-posted">
  <i class="comment-author">@Adamz</i><br>
  <p>Great one buddy thank you so much for sharing </p>
</div><br><br>
<div class="comment-posted">
    <i class="comment-author">@Miller</i><br>
    <p>This is awesome</p><br>
  </div>
  <br>
  <div class="comment-posted">
      <i class="comment-author">@Jeezy</i><br>
      <p>I like it</p>
    </div>
    <br>    
<input type="text"placeholder="write your comment..." name="comment" id="comment" required="">  
</form>
</div>
<?php } ?>

</div>
</div>   
 

<!--footer--> 
       
<?php  include "includes/footer.php"; ?>