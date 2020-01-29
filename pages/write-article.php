<?php  include "includes/header.php";?>	
<?php  include "../includes/functions.php"; ?>

<?php

   if(isset($_POST['create_post'])) {
    $post_author = escape($_POST['post_author']);
    $post_title = escape($_POST['title']);
    $post_image = escape($_FILES['image']['name']);
    $post_image_temp =escape($_FILES['image']['tmp_name']);
    $post_content =escape($_POST['post_content']);
    $post_date = escape(date('d-m-y'));
   

       
        move_uploaded_file($post_image_temp, "./photos/$post_image" );
          
      $query = "INSERT INTO posts(post_author,post_title,post_date,post_image,post_content)  ";
             
      $query .= "VALUES('{$post_author}','{$post_title}',now(),'{$post_image}','{$post_content}') "; 
             
      $create_post_query = mysqli_query($connection, $query);
      
      if(!$create_post_query){
        die("QUERY FAILED".mysqli_error($connection));
    }

    //   confirmQuery( $create_post_query);

    //  $the_post_id = mysqli_insert_id($connection);

      echo "<p>Post Added</p>";

   }

    ?>


    <!-- write an rticles-->

        <div class="create-article-page">
            <div class="article-form">
            <form action="" method="post" enctype="multipart/form-data">  	
                <h3>Write your article</h3> <br>

            <input type="text"placeholder="Article Title" name="title" required="" minlength="6" >

            <input type="text" placeholder="Post Author" name="post_author">

            <label for="photo">Upload an Image</label>
            <input type="file"name="image" id="image">

            <textarea name="post_content" rows="10" cols="50" placeholder="write your article..." required="" minlength="30" ></textarea>
            
                <button type="submit" name="create_post" >share article</button>
                </form>
    </div>
    </div>
 <!--footer--> 

 <?php  include "includes/footer.php"; ?>