<?php
    include "dbconnect.php";
    session_start();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    
    $password = md5($password);
    $query = "SELECT * from users where username='$username' and password='$password'";
    $result = $db->query($query);

    if($result->num_rows) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Check if the logged-in user is an admin
        if ($username == 'admin@123') {
            header('Location: admin.php');
        } else {
            // For regular users
            $_SESSION['myname'] = $myname;
            header('Location: account_details.php');
        }

        exit();
    } else {
        echo "Invalid username or password! Redirecting back to login page in 5 seconds...";
        header('refresh:5;url=login.php');
    }

    $db->close();
?>
