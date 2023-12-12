<?php
include 'db_connect.php';

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    $sql = "DELETE FROM people WHERE userId = $id_to_delete";

    if(mysqli_query($conn,$sql)){
        header('Location: ../pages/people.php');
    }else{
        echo 'Query error: '. mysqli_error($conn);
    }

}

?>