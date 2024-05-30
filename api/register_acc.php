<?php
include "dbconnect.php";

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$myname = $_POST['myname'];
$DOB = $_POST['DOB'];

if ($password != $password2) {
    echo "password dont match";
    exit;
}

$password = md5($password);

// Check if the username already exists
$query = "SELECT * FROM users WHERE username='$username'";
$result = $db->query($query);

if ($result->num_rows > 0) {
    echo "Username already exists. Choose a different username.";
    echo "Redirecting to registration page...";

    header("refresh:5;url=registration.php");

    exit;
} else {
    $query = "INSERT INTO users (username, password, myname, DOB) 
        VALUES ('$username','$password','$myname', '$DOB')";

    $result = $db->query($query);

    echo "Successfully registered! Redirecting to main page...";
    $db->close();
    header("refresh:5;url=login.php");
}
