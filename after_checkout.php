<?php
session_start();
include "dbconnect.php";

if (isset($_POST['proceed_to_payment'])) {
    if (isset($_SESSION['logged_in']) && isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $order_date = date("Y-m-d");
                $product_name = $item['product_name'];
                $quantity = $item['quantity'];
                $price = $item['price'];
                $price = $price * $quantity;
                $img_link = $item['img_link'];
                // Insert cart items into cart_items table
                $insertCartItemQuery = "INSERT INTO orders (username, product_name, quantity, price, order_date, status, img_link) VALUES ('$username', '$product_name', '$quantity', '$price', '$order_date', 'processing', '$img_link')";
                mysqli_query($db, $insertCartItemQuery);
            }
        }

        // After inserting into the database, clear the cart
        unset($_SESSION['cart']);

        // send email after checkout
        $to = "f32ee@localhost";
        $subject = "GEXE store | Your order is successful $order_date";
        $message = 
        "$username,"."\n".
        'Your order is currently being processed. View your purchase history from your account        
        Thank you for purchasing from us.';

        $headers = 'From: f31ee@localhost' . "\r\n" .
            'Reply-To: f31ee@localhost' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers,'-ff31ee@localhost');

        header('Location: order_history.php');
        exit();
    }
}
