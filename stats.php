<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Grafikai</title>
  <meta charset="utf-8">
  <script src="Chart.bundle.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <script   src="https://code.jquery.com/jquery-3.2.1.js"   integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="   crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">
    <div class="text-right">
      <a class="btn btn-primary" href="index.php">TO GAME</a>
    </div>
    <div class="row">
      <div class="col-8">
        <canvas id="myChart" width="400" height="280"></canvas>   
      </div>
      <div class="col-4">
        <table class="table">
          <thead class="thead-inverse">
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Game</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="1">
          </tbody>
        </table>
        
      </div>
    </div>
    <script>

      var total = [];
      var game = [];

      $.getJSON("game.php?my", function(data){
        var tr;
        for (var i = 0; i < data.length; i++) {
          tr = $('#1');
          tr.append("<tr>");
          tr.append("<td>" + data[i]['id'] + "</td>");
          tr.append("<td>" + data[i]['username'] + "</td>");
          tr.append("<td>" + data[i]['game'] + "</td>");
          tr.append("<td>" + data[i]['total'] + "</td>");
          tr.append("</tr>");
          
        }
      });
      
      $(document).ready(function(){
        $.getJSON("game.php?my", function(result){
          $.each(result, function(i, field){
            total.push(field.total);
            game.push(field.game);
          });
          myChart.update();
        });  
        });      

      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: game
          ,
          datasets: [{
            label: "<?php echo $_SESSION['username'] ?>",
            data: total,
            fill:false,
            backgroundColor: [
            'red',
            ],
            borderColor: [
            'red',
            ],
            borderWidth: 0
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        }
      });

    </script>
  </body>
  </html>
