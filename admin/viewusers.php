<?php  include "includes/header.php";?>	
   
<div class="post-list"id="printuser"> 
    <table class="centerTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstzname</th>
            <th>Lastname</th>
            <th>Username</th>
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
   $username = $row['username'];
  $user_email = $row['user_email'];
  $user_password = $row['user_password'];
  $user_role = $row['user_role'];
  $user_profile = $row['user_profile'];
  $user_created = $row['user_created'];
    echo "<tr>";
  ?>

<?php
  echo"<td data-label='user id'>$user_id</td>";
  echo"<td data-label='firstname'>$user_firstname</td>";
  echo"<td data-label='lastname'>$user_lastname</td>";
  echo"<td data-label='username'>$username</td>";
  echo"<td data-label='email'>$user_email</td>";
  echo"<td data-label='role'>$user_role</td>";
  echo "<td data-label='profile'><img src='../pages/images/$user_profile' alt='image' width='70' height='35'> </td>";
  echo"<td data-label='created'>$user_created</td>";
  ?>
  <form method="post">   
  <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
  <?php   
    echo '<td><button type="submit" name="change_to_admin">Admin</button></td>';
  ?>

  <form method="post">   
  <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
  <?php   
    echo '<td><button type="submit" name="change_to_user">User</button></td>';
  ?>
  <?php
  //echo "<td><button><a href='profile.php'>Edit</a></button></td>";
  echo "<td><button><a href='updateuser.php?p_id={$user_id}'>Edit</a></button></td>";
  ?> 
<form method="post">   
<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
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

<button class="print"onclick="printUserTable('printuser')">Print</button> 

<?php  include "includes/footer.php";?>	
<?php
if(isset($_POST['delete'])){

if(isset($_SESSION['user_role'])) {

$the_user_id = escape($_POST['user_id']);
$query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
}
$delete_query = mysqli_query($connection, $query);
header("Location: ./viewusers");
}
if(isset($_POST['change_to_admin'])) {  
  $the_user_id = escape($_POST['user_id']);
  $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";
  $change_to_admin_query = mysqli_query($connection, $query);
  header("Location: viewusers"); 
}
if(isset($_POST['change_to_user'])){
  $the_user_id =escape($_POST['user_id']);
  $query = "UPDATE users SET user_role = 'user' WHERE user_id = $the_user_id ";
  $change_to_sub_query = mysqli_query($connection, $query);
  header("Location: viewusers");

}
?>