<?php
//create connection
$conn = mysqli_connect('localhost','root','','dcembakasi');

if(!$conn){
    echo 'Connection Error' . mysqli_connect_error();
}
?>