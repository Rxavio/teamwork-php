<?php  include "includes/header.php"; ?>

    <!-- comment an article-->
    <div class="comment-article-page">

        <div class="comment-form">
        
         <h3>Feel Free To Write a Comment</h3> 

         <?php
             if(isset($_GET['p_id'])){
    
             $the_post_id = $_GET['p_id'];
               
    
        $query = "SELECT * FROM posts WHERE post_id= $the_post_id";
        $select_all_posts_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content =$row['post_content'];
        //$post_status = $row['post_status'];
        
        ?>     
<!-- post -->
<div class="info-card">
    <h4><?php echo $post_title ?></h4>
    <hr>
    <br>
    <img src="./images/<?php echo $post_image;?>">
    <p><?php echo $post_content ?></p> 

    <div class="more">
    <h5 class="author">By <?php echo $post_author ?> <i class="date"><?php echo $post_date ?></i></h5>

     <section class="btnlike">
    <a href="#">
    <img src="../assets/fonts/thumbs-up.svg" class="icon"/> <b>120</b>
    </a>
    </section>

     <section class="btncomment">
    <a href="#">

    <?php 
      $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
         $send_comment_query = mysqli_query($connection, $query);
         $row = mysqli_fetch_array($send_comment_query);
         $comment_id = $row['comment_id'];
         $count_comments = mysqli_num_rows($send_comment_query);
         echo "<img src='../assets/icons/comment.png' class='icon'/> <b> $count_comments</b>";
         ?>
    </a>
    </section>

  </div>

</div>
<?php 

if(isset($_POST['create_comment'])) {

    $the_post_id = $_GET['p_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];
    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

        $query = "INSERT INTO comments (comment_post_id,comment_author, comment_email, comment_content, comment_status,comment_date)";
        $query .= "VALUES ($the_post_id ,'{$comment_author}','{$comment_email}','{$comment_content }', 'approved',now())";

        $create_comment_query = mysqli_query($connection, $query);

        if (!$create_comment_query) {
            die('QUERY FAILED' . mysqli_error($connection));

        }

    }

}

?> 

<div class="comment">

<form action="" method="post" enctype="multipart/form-data"autocomplete="on">
<h4>Leave a Comment:</h4>
<div class="addcomment">
   <input type="text" name="comment_author" placeholder="Enter your name ..."> 
  <input type="email" name="comment_email" placeholder="Enter Email ...">
  <input type="text" name="comment_content" placeholder="write your comment..." > 
   <button type="submit" name="create_comment" class="commentbtn">Comment</button>
</div>
</form>
<!-- <hr> -->


<?php 

$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "AND comment_status = 'approved' ";
$query .= "ORDER BY comment_id DESC ";
$select_comment_query = mysqli_query($connection, $query);
if(!$select_comment_query) {
 die('Query Failed' . mysqli_error($connection));
 }
while ($row = mysqli_fetch_array($select_comment_query)) {
$comment_content= $row['comment_content'];
$comment_author = $row['comment_author'];
    
    ?>
  <div class="comment-posted">

  <i class="comment-author">@<?php echo $comment_author; ?></i><br>
  <p> <?php echo $comment_content; ?></p>
</div><br>

<?php } } }?> 

</div>




</div>

</div>  



<!--footer--> 
       
<?php  include "includes/footer.php"; ?>