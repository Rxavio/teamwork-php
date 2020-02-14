 <?php  include "includes/header.php"; ?>
		
<!-- header-->

<div class="shared-article-page">
<div class="shared-form">

<h3>Shared Articles</h3> 
<form class="search-action" action="./view-articles.php">	
<input type="text" placeholder="Search an article.." name="search" id="search">  
</form>

 <?php

$query = "SELECT * FROM posts ORDER BY post_id DESC ";
$select_all_posts_query = mysqli_query($connection,$query);



// $count=mysqli_num_rows($select_all_posts_query);
            
//             if($count < 1) {


//                 echo "<h1 class='text-center'>No posts available</h1>";
    
    
    
    
//             } else {

while($row = mysqli_fetch_assoc($select_all_posts_query)) {
$post_id = $row['post_id'];
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];

$post_content = substr($row['post_content'],0,202);
// }
//             }
// ?>


 <!-- shared articles-->
    <div class="info-card">
    <h4><?php echo $post_title ?></h4>
    <hr>
    <br>
    <a href="comment-article.php?p_id=<?php echo $post_id; ?>">
    <img src="./images/<?php echo $post_image;?>">
   </a>
    <p><?php echo $post_content ?></p>  

    <!-- <h5 class="author">By <?php //echo $post_author ?> <i class="date"><?php //echo $post_date ?></i></h5> -->
  
    <!-- <button>
    <a href="./comment-article.php">
    <i class="comment-articles"><img src="../assets/fonts/comment-solid.svg" class="icon"/></i> 77
    </a>
    </button>

    </p> 
  </a> -->
   
   <div class="more">
    <h5 class="author">By <?php echo $post_author ?> <i class="date"><?php echo $post_date ?></i></h5>

     <section class="btnlike">
    <a href="">
    <img src="../assets/fonts/thumbs-up.svg" class="icon"/><b>120</b>
    </a>
    </section>

    
    <section class="btnlike">
    <a href="comment-article.php?p_id=<?php echo $post_id; ?>">
    <?php 
      $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
         $send_comment_query = mysqli_query($connection, $query);

         $row = mysqli_fetch_array($send_comment_query);
         $comment_id = $row['comment_id'];
         $count_comments = mysqli_num_rows($send_comment_query);

         echo "<img src='../assets/icons/comment.png' class='icon'/><b>$count_comments</b>";
         ?> 
    </a>
    </section>

      </div>
        
</div>

<?php } ?>

    </div>
    </div>

   
 <!--footer--> 

 <?php  include "includes/footer.php"; ?>
