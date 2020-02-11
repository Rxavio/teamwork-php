<?php  include "includes/header.php";?>	
<?php  include "../includes/functions.php"; ?>
   
<div class="post-list"> 
    <table class="centerTable">
        <thead>
          <tr>
            <th>Comment_ID</th>
            <th> by</th>
            <th>Email</th>
             <th>Comments</th>
            <th>Created</th>
            <th>Status</th>
            <th>On Post</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
          </tr>
        </thead>


<tbody>
<?php

$query = "SELECT * FROM comments ORDER BY comment_id DESC ";
$select_comments = mysqli_query($connection,$query);  

while($row = mysqli_fetch_assoc($select_comments)) {
$comment_id = $row['comment_id'];
$comment_post_id = $row['comment_post_id'];
$comment_author = $row['comment_author'];
$comment_email = $row['comment_email'];
$comment_date = $row['comment_date'];
$comment_status = $row['comment_status'];
$comment_content = substr($row['comment_content'],0,20);


echo "<tr>";
echo "<td> $comment_id</td>";
// echo "<td> $comment_post_id</td>";
echo "<td> $comment_author</td>";
echo "<td> $comment_email</td>";
echo "<td> $comment_content</td>";
echo "<td> $comment_date</td>";
echo "<td> $comment_status</td>";

 //echo "<td> some title</td>";

 $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
 $select_post_id_query = mysqli_query($connection,$query);
 while($row = mysqli_fetch_assoc($select_post_id_query)){
 $post_id = $row['post_id'];
 $post_title = $row['post_title']; 
  echo "<td><a href='../pages/comment-article.php?p_id=$post_id'>$post_title</a></td>";
 }




 echo "<td><a href=''>Approve</a></td>";
 echo "<td><a href=''>Unapprove</a></td>";
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



