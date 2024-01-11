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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/97ab0026dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../public/styles.css" />
    <title>About</title>
    <link rel="icon" href="../public/images/logo1-modified.png" type="image/icon type">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  </head>

  <body>
    <!-- Top Bar -->
     <div class="top-bar">
      <h3><?php echo $_SESSION['username']; ?></h3>
    </div>
   
   <?php include '../public/includes/nav.php' ?>
   <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
   
   <script>
const xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
const yValues = [55, 49, 44, 24, 15];
const barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
</script>    
   

   
    

    <script src="../script.js"></script>
  </body>
</html>