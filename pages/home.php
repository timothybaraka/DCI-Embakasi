<?php
include '../config/db_connect.php';
session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
       header("Location: login.php"); 
   } 

$sql = "SELECT tithes.*, people.tithe_no,people.first_name,people.last_name FROM tithes LEFT JOIN people ON tithes.tithe_no = people.tithe_no";
   //$sql = "SELECT * FROM tithes ORDER BY record_date";

$result = mysqli_query($conn, $sql);

$tithes = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/97ab0026dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../public/styles.css" />
    <title>Home</title>
    <link rel="icon" href="../public/images/logo1-modified.png" type="image/icon type">
  </head>

  <body>
    <!-- Top Bar -->
     <div class="top-bar">
      <h3><?php echo $_SESSION['username']; ?></h3>
    </div>
   
   <?php include '../public/includes/nav.php' ?>
   
    
    <div class="newperson">
      <div class="main">
        <button id="newuser" onclick="showHide()">New Entry</button><br />
        <form class="userform" id="userForm" action="../config/add_tithe.php" method="POST">
          <span>
            <i class="fa-solid fa-hashtag"></i>
            <input id="tithe" type="number" placeholder="Tithe Number" name="titheNumber" required/></span><br/>

            <span>
            <i class="fa-solid fa-calendar"></i>
            <input id="amount" type="month" placeholder="Amount" name="amount" required/></span><br/>

          <span>
            <i class="fa-solid fa-coins"></i>
            <input id="amount" type="number" placeholder="Amount" name="amount" required/></span><br/>

          <button id="addEntry" name="submit" type="submit" onclick="addEntry()">Add Entry</button>
        </form>
      </div>
    </div>

    <?php if($tithes){ ?>

    <div class="resultsCard">
      <div class="tableTitle">
        <h2>Tithes</h2>
      </div>
        <div class="card-body">
          <table class="table">
            <tr class="tableHeadings">
              <th>Tithe Number</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Month</th>
              <th>Amount</th>
              <th>Time</th>
            </tr>

          <?php foreach($tithes as $tithe): ?>
            <tr>
              <td><?php echo $tithe['tithe_no']?></td>
              <td><?php echo $tithe['first_name']?></td>
              <td><?php echo $tithe['last_name']?></td>
              <td><?php echo $tithe['month']?></td>
              <td><?php echo $tithe['amount']?></td>
              <td><?php echo $tithe['record_date']?></td>
              <td> 
                <form action="../config/delete_tithe.php" method="POST">
                <input type="hidden" name="tithe_to_delete" value="<?php echo $tithe['tithe_id']?>">
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0"></form>
            </td>
            </tr> 
            </tr> 
            <?php endforeach ?> 
          </table>
           
        </div>
    
  </div>
    
  <?php }else{ ?>
    <div class="resultsCard"><p>No tithes have been added</p></div>
    

    <?php }?>

    <script src="../script.js"></script>
  </body>
</html>