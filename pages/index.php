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
    <img src="./images/<?php echo $post_image;?>">
    <p><?php echo $post_content ?></p>  
    <h5 class="author">By <?php echo $post_author ?> <i class="date"><?php echo $post_date ?></i></h5>

    <a href="./comment-article.php">
    <i class="comment-articles"><img src="../assets/fonts/comment-solid.svg" class="icon"/></i>
    </a>

</div>
<?php } ?>

    </div>

    </div>
 <!--footer--> 

 <?php  include "includes/footer.php"; ?>
