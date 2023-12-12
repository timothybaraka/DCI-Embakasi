<?php
session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
       header("Location: login.php"); 
   } 

$name = $_SESSION['username'];


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/97ab0026dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../public/styles.css" />
    <title>People</title>
     
  </head>
  <body>
   
    <?php include '../public/includes/nav.php' ?>
   
    <p>Welcome</p>
    

    <script src="script.js"></script>
  </body>
</html>