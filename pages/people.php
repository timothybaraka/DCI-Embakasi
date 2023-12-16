<?php
include '../config/db_connect.php';

session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['useremail'])){
       header("Location: login.php"); 
   } 

//sql query
$sql = 'SELECT userId,tithe_no,first_name,last_name,contact FROM people ORDER BY tithe_no';

//make query to get result
$result = mysqli_query($conn, $sql);

//fetch as an array
$people = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

//close connection
mysqli_close($conn);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://kit.fontawesome.com/97ab0026dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../public/styles.css" />
    <title>People</title>
    </head>

  <body>
     <!-- Top Bar -->
     <div class="top-bar">
      <h3><?php echo $_SESSION['username']; ?></h3>
    </div>

    <!-- <?php include '../config/db_connect.php' ?> -->
    <?php include '../public/includes/nav.php' ?>

    <div class="newperson">
      <div class="main">
        <button id="newuser" onclick="showHide()">New User</button><br />
        <form class="userform" id="userForm" action="../config/add_person.php" method="POST">
          <span>
            <i class="fa-solid fa-hashtag"></i>
            <input type="number" id="titheNo"placeholder="Tithe Number" name="titheNumber" required/></span><br/>
          <span>
            <i class="fa fa-user"></i>
            <input type="text" id="firstName" placeholder="First Name" name="firstName" required/></span><br/>
          <span>
            <i class="fa fa-user"></i>
            <input type="text" id="lastName" placeholder="Last Name" name="lastName" required/></span><br/>
          <span>
            <i class="fa-solid fa-phone-flip"></i>
            <input type="number" id="contact" placeholder="Contact" name="contact" required/> </span><br />
          <button id="addUser" name="submit" type="submit" >Add User</button>
        </form>
      </div>
    </div>

    <div class="resultsCard">
      <div class="tableTitle"><h2>People</h2></div>
       <table class="table">
          <tr>
            <th>Tithe Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>

        <?php  foreach($people as $person){ ?>
          <tr>
            <td><?php echo $person['tithe_no'] ?></td>
            <td><?php echo $person['first_name'] ?></td>
            <td><?php echo $person['last_name'] ?></td>
            <td><?php echo $person['contact'] ?></td>
            <td>
            <a href="update_person.php?id=<?php echo $person['userId']?>"><button>Edit</button></a>
                
            </td>
            
            <td> 
                <form action="../config/delete_person.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $person['userId']?>">
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0"></form>
            </td>
         </tr>
         <?php } ?>
        </table>
      </div>

    <script src="../script.js"></script>
  </body>
</html>


<!-- <form action="update_person.php" method="POST">
                <input type="hidden" name="id_to_update" value="<?php echo $person['userId']?>">
                <input type="submit" name="update" value="Update" class="btn brand z-depth-0"></form> -->