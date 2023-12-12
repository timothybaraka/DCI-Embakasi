<?php
include '../config/db_connect.php';



if(isset($_GET['id'])){
$id = mysqli_real_escape_string($conn, $_GET['id']);

//make sql
$sql = "SELECT * FROM people WHERE userId = $id ";

//result
$result = mysqli_query($conn, $sql);

//fetch in associative
$people = mysqli_fetch_assoc($result);

mysqli_free_result($result);

mysqli_close($conn);


}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://kit.fontawesome.com/97ab0026dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../public/styles.css" />
    <title>People</title>
  </head>
  <body>
    <?php include '../public/includes/nav.php' ?>

    <div class="newperson">
      <div class="main">
        <button id="newuser" onclick="showHide()">Update User</button><br />
        
        <form class="userform" id="userForm" action="../config/update.php" method="POST">
            <?php if(isset($people)): ?>
          <span>
            <i class="fa-solid fa-hashtag"></i>
            <input type="number" id="titheNo"placeholder="Tithe Number" value="<?php echo $people['tithe_no']?>" name="titheNumber" required/></span><br/>
          <span>
            <i class="fa fa-user"></i>
            <input type="text" id="firstName" placeholder="First Name" value="<?php echo $people['first_name']?>" name="firstName" required/></span><br/>
          <span>
            <i class="fa fa-user"></i>
            <input type="text" id="lastName" placeholder="Last Name" value="<?php echo $people['last_name']?>" name="lastName" required/></span><br/>
          <span>
            <i class="fa-solid fa-phone-flip"></i>
            <input type="number" id="contact" placeholder="Contact" value="<?php echo $people['contact']?>" name="contact" required/> </span><br />
          <button id="addUser" name="update" type="submit" >Update User</button>
          <?php else: ?>
            <p>People array not defined</p>
          <?php endif; ?>  
        </form>
      </div>
    </div>

 <script src="../script.js"></script>
  </body>
</html>