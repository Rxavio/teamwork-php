<?php  include "includes/header.php";?>	

<?php

if(isset($_POST['checkBoxArray'])) {
    
    foreach($_POST['checkBoxArray'] as $postValueId ){
        
  $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options) {
			
        case 'published':
        
$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
        
 $update_to_published_status = mysqli_query($connection,$query);       
confirmQuery($update_to_published_status);


            
         break;
            
            
         case 'draft':
        
$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
        
 $update_to_draft_status = mysqli_query($connection,$query);
            
confirmQuery($update_to_draft_status);
  
            
         break;

  case 'delete':

  $query = "DELETE FROM posts WHERE post_id = {$postValueId}  ";
          
    $update_to_delete_status = mysqli_query($connection,$query);
              
  confirmQuery($update_to_delete_status);
    
            break;

    case 'clone':


      $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
      $select_post_query = mysqli_query($connection, $query);


    
      while ($row = mysqli_fetch_array($select_post_query)) {
      $post_title         = $row['post_title'];
      $post_user_id        = $row['post_user_id'];
      $post_date          = $row['post_date']; 
      $post_author        = $row['post_author'];
      $post_status        = $row['post_status'];
      $post_image         = $row['post_image'] ; 
      // $post_tags          = $row['post_tags']; 
      $post_content       = $row['post_content'];

      }
       $query = "INSERT INTO posts(post_user_id,post_author,post_title,post_date,post_image,post_content,post_status)  ";
    
      $query .= "VALUES({$post_user_id},'{$post_author}','{$post_title}',now(),'{$post_image}','{$post_content}', '{$post_status}') "; 
              
      $copy_post_query = mysqli_query($connection, $query);

      confirmQuery( $copy_post_query);

        } 



      }
    }
      

         ?>





   
<div class="post-list"> 

<form action="" method='post'>
<table class="centerTable">
 <div id="bulkOptionContainer" class="selectoption">
<select class="" name="bulk_options" id="">
<option value="">Select Options</option>
<option value="published">Publish</option>
<option value="draft">Draft</option>
<option value="delete">Delete</option>
 <option value="clone">Clone</option>
</select>

<div class="clickbtn">
<input type="submit" name="submit" class="" value="Apply">
<a href="addpost">Add New</a>
</div>

</div> 
   





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

  $query = "SELECT * FROM posts ORDER BY post_id DESC ";
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
      </form>       
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