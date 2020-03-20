        <?php  include "includes/header.php";?>	
        <?php

$post_count = count_records(get_all_user_posts());
$comment_count = count_records(get_all_posts_user_comments());

?>
       <center> <h1>
         Welcome to user dashboard <?php echo strtolower(get_user_name());?>
        </h1>
        </center>
        
           <div class="card"> 
           <a href="viewposts">  
            <div class="card-circle">

            <?php
             echo  "<h4>{$post_count}</h4> "
             ?>

            <p>POSTS</p>
           </div>
          </a>
          </div> 

             <div class="card"> 
              <a href=" ">   
            <div class="card-circle">
            <!--  -->
          
            <h4>
           <?php echo strtoupper(get_user_name());?>
           </h4>
            
          
            <p>USER</p>
           </div>
             </a>
          </div> 

            <div class="card"> 
            <a href="comments">   
            <div class="card-circle">
            <?php
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
        // $element_text = ['All Posts', 'Comments', 'All Users'];       
        // $element_count = [$post_count, $comment_countt, $users_count];
        //   for($i=0;$i<3;$i++){
        //  echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
        //   }
         
          ?>

         ['Posts', 50,],
         ['comment', 150,],
         ['users', 90,],
                 
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