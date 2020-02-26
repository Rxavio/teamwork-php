 <?php  include "includes/header.php"; ?>		
<!-- header-->

<div class="shared-article-page">

<div class="shared-form">

<h3>Shared Articles</h3> 
<form class="search-action" action="./view-articles.php">	
<input type="text" placeholder="Search an article.." name="search" id="search">  
</form>

 <?php
                       
        $per_page = 5;


        if(isset($_GET['page'])) {


        $page = $_GET['page'];

        } else {


            $page = "";
        }


        if($page == "" || $page == 1) {

            $page_1 = 0;

        } else {

            $page_1 = ($page * $per_page) - $per_page;

        }
        $post_query_count= "SELECT * FROM posts";
        $find_count=mysqli_query($connection,$post_query_count);
        $count=mysqli_num_rows($find_count);

        $count  = ceil($count /$per_page);

$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1, $per_page";
$select_all_posts_query = mysqli_query($connection,$query);


while($row = mysqli_fetch_assoc($select_all_posts_query)) {
$post_id = $row['post_id'];
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];

$post_content = substr($row['post_content'],0,202);

?>


 <!-- shared articles-->
    <div class="info-card">
    <h4><?php echo $post_title ?></h4>
    <hr>
    <br>
   
    <a href="comment-article.php?p_id=<?php echo $post_id; ?>">
    <img src="./images/<?php echo $post_image;?>">
   </a>
    <p><?php echo $post_content ?></p>  

     
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
      $query = "SELECT * FROM comments WHERE comment_post_id = $post_id  ";
      $query .= "AND comment_status = 'approve' ";
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

 <!--pagination--> 
 <div class="pagination">
  <!-- <a href="#">&laquo;</a>
  <a href="#" class="active" id="first">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
   <a href="#">7</a>
  <a href="#">8</a>
   <a href="#">9</a>
  <a href="#">10</a>
  <a href="#">&raquo;</a> -->



<?php 

for($i =1; $i <= $count; $i++) {


if($i == $page) {

     echo "<a class='active'id='first' href='index.php?page={$i}'>{$i}</a>";


}  else {

    echo "<a href='index.php?page={$i}'>{$i}</a>";

}

}

 ?>
 
   </div>


</div>

 <!--footer--> 

 <?php  include "includes/footer.php"; ?>
