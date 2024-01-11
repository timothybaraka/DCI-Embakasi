<?php
include 'db_connect.php';

if(isset($_POST['delete'])){
    $tithe_to_delete = mysqli_real_escape_string($conn,$_POST['tithe_to_delete']);

    $sql = "DELETE FROM tithes WHERE tithe_id = $tithe_to_delete";

    if(mysqli_query($conn,$sql)){
        header('Location: ../pages/home.php');
    }else{
        echo 'Query error: '. mysqli_error($conn);
    }

}

?>