<?php
session_start();

// Include the database connection file
include '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the user exists
    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // User authenticated successfully
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            header('Location: home.php'); // Redirect to the dashboard or any other page
            exit();
        } else {
            $error_message = 'Invalid username or password';
        }
    } else {
        $error_message = 'Query error: ' . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css" />
    <script src="https://kit.fontawesome.com/97ab0026dc.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="../public/images/logo1-modified.png" height="150px" width="150px">
        </div>
        <div class="main">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <span>
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Username" name="username" required>
                </span><br>
                <span>
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" required>
                </span><br>
                <button type="submit">Login</button>
            </form>

            <?php if (isset($error_message)) { ?>

                <script>
                    // Show pop-up box with error message
                    alert('<?php echo $error_message; ?>');
                </script>
            
            <?php  } ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
