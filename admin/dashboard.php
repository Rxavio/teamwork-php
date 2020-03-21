        <?php  include "includes/header.php";?>	

        <center><h1>
         Welcome to admin dashboard <?php echo strtolower(get_user_name());?>
        </h1>
        </center>
           <div class="card"> 
           <a href="viewposts">  
            <div class="card-circle">


           

            <?php
            $query = "SELECT * FROM posts";
             $select_all_posts = mysqli_query($connection,$query);
             $post_count = mysqli_num_rows( $select_all_posts);
             echo  "<h4>{$post_count}</h4> "
             ?>

            <p>POSTS</p>
           </div>
          </a>
          </div> 

             <div class="card"> 
              <a href="viewusers">   
            <div class="card-circle">
            <?php
            $query = "SELECT * FROM users";
             $select_all_users = mysqli_query($connection,$query);
             $users_count = mysqli_num_rows( $select_all_users);
             echo  "<h4>{$users_count}</h4> "
             ?>
          
            <p>USERS</p>
           </div>
             </a>
          </div> 

            <div class="card"> 
            <a href="comments">   
            <div class="card-circle">
            <?php
            $query = "SELECT * FROM comments";
             $select_all_comments = mysqli_query($connection,$query);
             $comment_count = mysqli_num_rows( $select_all_comments);
             echo"<h4>{$comment_count}</h4> "
             ?>
            <p>COMMENTS</p>
           </div>
             </a>
          </div> 
           
          <?php 

// $query = "SELECT * FROM posts WHERE post_status = 'published' ";
// $select_all_published_posts = mysqli_query($connection,$query);
// $post_published_count = mysqli_num_rows($select_all_published_posts);
                                                                         
// $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
// $select_all_draft_posts = mysqli_query($connection,$query);
// $post_draft_count = mysqli_num_rows($select_all_draft_posts);


// $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
// $unapproved_comments_query = mysqli_query($connection,$query);
// $unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);


// $query = "SELECT * FROM users WHERE user_role = 'user'";
// $select_all_subscribers = mysqli_query($connection,$query);
// $user_count = mysqli_num_rows($select_all_subscribers);

   ?>
<div class="chart">
  
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'count'],
          <?php
        //   $element_text=['Active post','comments','Users','Categories'];
        //   $element_count=[$post_count, $comment_count, $user_count, $category_count];

        $element_text = ['All Posts','Comments', 'Users'];       
        $element_count = [$post_count, $comment_count, $users_count];

          for($i=0;$i<3;$i++){
         echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
          }
         
          ?>

        //  ['Posts', 60,],
        //  ['comment', 350,],
        //  ['users', 15,],
        // ['categories', 10,],
         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

  </div>
<?php  include "includes/footer.php";?>	