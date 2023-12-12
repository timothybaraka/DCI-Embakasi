<?php
include '../config/db_connect.php';

if(isset($_POST['update'])){

$titheNumber = mysqli_real_escape_string($conn, $_POST['titheNumber']);
$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']); 
//sql query
$sql = "UPDATE people SET tithe_no='$titheNumber', first_name='$firstName', last_name='$lastName', contact='$contact' WHERE tithe_no='$titheNumber'";

if(mysqli_query($conn,$sql)){
    header('Location:../pages/people.php');
}else{
    echo 'Query error: ' .mysqli_error($conn);
}
}

?>