<?php
include '../config/db_connect.php';
session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
       header("Location: login.php"); 
   } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/97ab0026dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../public/styles.css" />
    <title>Dynamic Bar Graph</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
</head>
<body>

<!-- Top Bar -->
<div class="top-bar">
      <h3><?php echo $_SESSION['username']; ?></h3>
    </div>
   
   <?php include '../public/includes/nav.php' ?>

    <h1>This Year</h1>

    <!-- Create a canvas element for the chart -->
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
   
    <div class="info-chart">
    <script>
       $(document).ready(function () {
    $.post("../config/chart.php", function (data) {
        var months = [];
        var amounts = [];

        for (var i in data) {
            months.push(data[i].month);
            amounts.push(data[i].amount);
        }

        var chartdata = {
            labels: months,
            datasets: [
                {
                    label: 'Amount',
                    backgroundColor: '#83acf1',
                    borderColor: '#46d5f1',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: amounts
                }
            ]
        };

        var graphTarget = $("#myChart");

        var barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata
        });
    });
});
    </script>
    </div>

</body>
</html>
