<?php  include "includes/header.php";?>	
   
<div class="post-list"> 
    <table class="centerTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Profile</th>
             <th>Created</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>


<tbody>

<?php

  $query = "SELECT * FROM users ORDER BY user_id DESC ";
  $select_user = mysqli_query($connection,$query);  
  
  while($row = mysqli_fetch_assoc($select_user)) {

  $user_id = $row['user_id'];
  $user_firstname = $row['user_firstname'];
   $user_lastname = $row['user_lastname'];
  $user_email = $row['user_email'];
  $user_password = $row['user_password'];
  $user_role = $row['user_role'];
  $user_profile = $row['user_profile'];
  $user_created = $row['user_created'];
    echo "<tr>";
  ?>

<?php
  echo"<td>$user_id</td>";
  echo"<td>$user_firstname</td>";
  echo"<td>$user_lastname</td>";
  echo"<td>$user_email</td>";
  echo"<td>$user_role</td>";
  echo "<td><img src='../pages/images/$user_profile' alt='image' width='70' height='35'> </td>";
  echo"<td>$user_created</td>";
  echo "<td> <a href=''>admin</a></td>";
  echo "<td><a href=''> user</a></td>";
  echo "<td><button><a href='profile.php'>Edit</a></button></td>";
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


