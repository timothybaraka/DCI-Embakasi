<?php
// Include the database connection file
include 'db_connect.php';

// Query to get data from the database
$sql = "SELECT amount,month FROM tithes";
$result = mysqli_query($conn, $sql);

// Fetch data as an associative array
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
