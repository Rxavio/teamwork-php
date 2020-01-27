<?php  include "includes/header.php";?>		

    <!-- write an rticles-->

        <div class="create-article-page">
            <div class="article-form">
              <form class="article-action" action="./view-articles.php">	
                <h3>Write your article</h3> <br>
            <input type="text"placeholder="Article Title" name="title" required="" minlength="6" >
            <label for="photo">Upload an Image</label>
            <input type="file" class="" name="image" id="image">
            <textarea name="article" rows="10" cols="50" placeholder="write your article..." required="" minlength="30" ></textarea>
                <button>share article</button>
                </form>
    </div>
    </div>
 <!--footer--> 

 <?php  include "includes/footer.php"; ?>