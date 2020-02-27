<?php

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));

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


  ?>
