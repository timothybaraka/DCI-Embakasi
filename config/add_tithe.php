<?php

include 'db_connect.php';

if(isset($_POST['submit'])){
  $titheNumber = mysqli_real_escape_string($conn,$_POST['titheNumber']);
  $amount = mysqli_real_escape_string($conn,$_POST['amount']);
  $month = mysqli_real_escape_string($conn,$_POST['month']);

  $sql = "INSERT INTO tithes(tithe_no,amount,month) VALUES('$titheNumber','$amount','$month')";

  //query
  if(mysqli_query($conn,$sql)){
    header('Location:../pages/home.php');
}else{
    echo 'Query error: ' .mysqli_error($conn);
}
}
?>