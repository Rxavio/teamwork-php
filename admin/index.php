        <?php  include "includes/header.php";?>	
        <?php  include "../includes/functions.php"; ?>

           <div class="card"> 
           <a href="viewposts.php">  
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
              <a href="viewusers.php">   
            <div class="card-circle">
            <?php
            $query = "SELECT * FROM users";
             $select_all_users = mysqli_query($connection,$query);
             $user_count = mysqli_num_rows( $select_all_users);
             echo  "<h4>{$user_count}</h4> "
             ?>
          
            <p>USERS</p>
           </div>
             </a>
          </div> 

            <div class="card"> 
            <a href="comments.php">   
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
		</div>

<div class="chart">
   <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'posts', 'users', 'comments'],
          ['2017', 1000, 400, 200],
          ['2018', 1170, 460, 250],
          ['2019', 660, 1120, 300],
          ['2020', 1030, 540, 350]
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