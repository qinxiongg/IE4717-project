<?php

include "dbconnect.php";

session_start();
    $username = $_POST['username'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sql = "UPDATE orders SET status = '$status' WHERE id = '$id'";
$db->query($sql);
// send email after checkout
$to = "f32ee@localhost";
$subject = "GEXE store | Order status changed";
$message = 
"$username,"."\n".
'Your order status for orderid '."$id".' has changed to '. "$status"."\n".
"\n".'Check your order history';

$headers = 'From: f31ee@localhost' . "\r\n" .
    'Reply-To: f31ee@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers,'-ff31ee@localhost');

header('location:admin.php');
?>