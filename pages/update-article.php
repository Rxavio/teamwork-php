<?php  include "includes/header.php";?>	
    <!--header-->
        <div class="update-article-page">
            <div class="update-form">
              <form class="update-action" action="./edit-delete-article.php">	
            <h3>Update your article</h3><br>
            <input type="text"value="The Benefits of Online Collaboration Tools" id="title"  required="" minlength="6">
            <input type="file" class="width-50" name="image" id="image">
            <img src="../assets/images/banner.jpg">
            <textarea name="article" rows="10" cols="50"  required="" minlength="3">
Teamwork is one of the most important aspects of the modern workplace. However, widespread Internet availability means that members of the team could be just about anywhere in the world. So for teamwork to be effective, it’s important for companies to adopt modern work practices and technologies that help co-workers, wherever they are, share their work in a simple and efficient way. This is where a good online collaboration tool comes in. If you’re contemplating adopting--or proposing the adoption of--online collaboration tools, the list of online collaboration benefits below may help you and your organization make a decision on this useful technology.
            </textarea>
            <button>Update article</button>
          </form>
    </div>
    </div>
<!--footer--> 


<?php  include "includes/footer.php"; ?>

 