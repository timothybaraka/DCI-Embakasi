<?php

include 'db_connect.php';

if(isset($_POST['submit'])){

$titheNumber = mysqli_real_escape_string($conn, $_POST['titheNumber']);
$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);

//sql query
$sql = "INSERT INTO people(tithe_no,first_name,last_name,contact) VALUES('$titheNumber','$firstName','$lastName','$contact')";

//mysql query
if(mysqli_query($conn,$sql)){
    header('Location:../pages/people.php');
}else{
    echo 'Query error: ' .mysqli_error($conn);
}

}
?>