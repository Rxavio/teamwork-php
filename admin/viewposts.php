<?php  include "includes/header.php";?>	
   
<div class="post-list"> 
    <table class="centerTable">
        <thead>
          <tr>
          <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>P_ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Created</th>
            <th>Image</th>
            <th>Content</th>
            <th>Status</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Visitors</th>
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
  // $post_category_id = $row['post_category_id'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  // $post_status = $row['post_status'];
  $post_content = substr($row['post_content'],0,20);
  // $post_tags = $row['post_tags'];

  // $post_views_count = $row['post_views_count'];

  echo "<tr>";
  ?>
  <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                                 
                               
            <?php
          echo "<td> $post_id</td>";
          echo "<td> $post_author</td>";
          echo "<td> $post_title</td>";

          echo "<td> $post_date</td>";
          echo "<td><img src='../pages/images/$post_image' alt='image' width='70' height='35'> </td>";
          echo "<td> $post_content</td>";




          echo"<td>published</td>";
          echo "<td>coding</td>";
          echo "<td><a href=''>30</a></td>";
          echo"<td><a href=''>95</a></td>";
          echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
           echo"<td><button><a href='updatepost.php'>Edit</a></button></td>";
          echo "<td><button><a href=''>Delete</a></button></td>";
 


echo "</tr>";
}    
?> 
 </tbody>
</table>       
</div>

 
  

</div>
</div>
</div>

<!-- Footer-->


