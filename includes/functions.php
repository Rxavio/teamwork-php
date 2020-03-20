<?php

function redirect($location){
  header("Location:" . $location);
  exit;
}

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));

    }

 function query($query){
      global $connection;
      $result = mysqli_query($connection, $query);
      confirmQuery($result);
      return $result;
  }
 
function confirmQuery($result) {
        global $connection;
        if(!$result ) {
         die("QUERY FAILED ." . mysqli_error($connection));   
          }
    }
function fetch_result($result){
  return mysqli_fetch_array($result);
  }

  function fetchRecords($result){
    return mysqli_fetch_array($result);
}

function count_records($result){
    return mysqli_num_rows($result);
}
  
function count_result($result){
  return mysqli_num_rows($result);
  }

function get_user_name(){
return isset($_SESSION['username']) ? $_SESSION['username'] : null;
  }
  
function isLoggedIn(){
    if(isset($_SESSION['user_role'])){
        return true;
    }
   return false;
}

function is_admin() {
  if(isLoggedIn()){
      $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
      $row = fetch_result($result);
      if($row['user_role'] == 'admin'){
          return true;
      }else {
          return false;
      }
  }
  return false;
}

function loggedInUserId(){
  if(isLoggedIn()){
      $result = query("SELECT * FROM users WHERE username='" . $_SESSION['username'] ."'");
      confirmQuery($result);
      $user = mysqli_fetch_array($result);
     return mysqli_num_rows($result) >= 1 ? $user['user_id'] : false;
  }
  return false;
}


function get_all_user_posts(){
  return query("SELECT * FROM posts WHERE post_user_id=".loggedInUserId()."");
}

function get_all_posts_user_comments(){
  return query("SELECT * FROM posts
  INNER JOIN comments ON posts.post_id = comments.comment_post_id
  WHERE post_user_id=".loggedInUserId()."");

}






  ?>
