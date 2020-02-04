        <?php  include "includes/header.php";?>	

        <div class="info">	
        
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



<!-- </div>
</div> -->



