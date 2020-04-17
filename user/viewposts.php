<?php  include "includes/header.php";?>	

   
<div class="post-list"> 
    <table class="centerTable">
        <thead>
          <tr>
          <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>P_ID</th>
            <th>By</th>
            <th>Title</th>
            <th>Created</th>
            <th>Image</th>
            <th>Content</th>
            <th>Status</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Views</th>
            <th>Preview</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>


<tbody>
<?php

  // $query = "SELECT * FROM posts ORDER BY post_id DESC ";
  $query = "SELECT * FROM posts WHERE post_user_id=".loggedInUserId()." ORDER BY post_id DESC ";
  $select_post = mysqli_query($connection,$query);  
  
  while($row = mysqli_fetch_assoc($select_post)) {

  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
   $post_title = substr($row['post_title'],0,20);
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_status = $row['post_status'];
  $post_content = substr($row['post_content'],0,20);
  // $post_tags = $row['post_tags'];
  $post_views_count = $row['post_views_count'];

  echo "<tr>";
  ?>
  <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                                                 
            <?php
          echo "<td data-label='post id'> $post_id</td>";
          echo "<td data-label='by'> $post_author</td>";
          echo "<td data-label='title'> $post_title</td>";
          echo "<td data-label='created'> $post_date</td>";
          echo "<td data-label='image'><img src='../pages/images/$post_image' alt='image' width='70' height='35'> </td>";
          echo "<td data-label='content'> $post_content</td>";
          echo"<td data-label='status'>$post_status</td>";
          echo "<td data-label='tags'>coding</td>";
          

         // echo "<td><a href=''>30</a></td>";
         $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
         $send_comment_query = mysqli_query($connection, $query);

         $row = mysqli_fetch_array($send_comment_query);
         $comment_id = $row['comment_id'];
         $count_comments = mysqli_num_rows($send_comment_query);
         echo "<td data-label='comments'><a href=''>$count_comments</a></td>";

          //echo"<td><a href=''>95</a></td>";
          echo "<td data-label='views'><a href=''>{$post_views_count}</a></td>";

          echo "<td data-label='preview'><a href='../pages/comment-article.php?p_id={$post_id}'>View Post</a></td>";
          
          echo "<td><button><a href='updatepost.php?p_id={$post_id}'>Edit</a></button></td>";
           ?> 

           <form method="post">   
          <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
            <?php   
              echo '<td><button type="submit" name="delete">Delete</button></td>';
            ?>     
          </form>
         
 
          <?php

      echo "</tr>";
      }    
      ?> 
      </tbody>
      </table>       
      </div>
     <?php  include "includes/footer.php";?>	

 <?php
if(isset($_POST['delete'])){

if(isset($_SESSION['user_role'])) {
$the_post_id = escape($_POST['post_id']);
$query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
}
$delete_query = mysqli_query($connection, $query);
header("Location: ./viewposts");

}
?>