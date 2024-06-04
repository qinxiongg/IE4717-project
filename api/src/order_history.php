<?php
include "dbconnect.php";
session_start();
if (isset($_SESSION['logged_in']) === true) {
    // User is logged in, can access user-specific data
    $username = $_SESSION['username'];
} else {
    header('Location:login.php');
}

$sql = "SELECT id, product_name, quantity, price, order_date, status, img_link FROM orders WHERE username = '$username'";
$result = $db->query($sql);

$orderHistory = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orderHistory[] = $row;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order History</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        h2 {
            margin-top: 30px;
            margin-bottom: 50px;
            text-align: center;
        }

        .order_history {
            margin: 0 auto;
            width: 70%;
        }

        table {
            margin: auto;
        }

        tr,
        td {
            padding: 20px 40px 20px 40px;
        }

        th {
            border-bottom: grey solid;
        }

        p {
            text-align: center;
        }
    </style>
</head>

<body>
<div class="navbar">
        <img class="logo" src="images/logo.png">
        <div class="nav_center">
            <li><a href="index.php">Home</a></li>
            <li><a href="catalogue.php">Catalogue</a></li>
            <li><a href="brands.php">Brands</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </div>
        <div class="nav_right">
            <?php
            if (isset($_SESSION['logged_in']) === true) {
                echo "<li><a href='account_details.php'>$username</a></li>";
            } else {
                echo "<a href='login.php'><img src='images/login_icon.png' alt='login' style='width: 30px; height: 30px;'></a>";
            }
            ?>
            <a href="cart.php"><img src='images/cart_icon.png' alt='login' style='width: 30px; height: 30px;'></a>
        </div>
    </div>
    <div id="wrapper">
        <h2>Order History</h2>
        <div class="order_history">


            <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Order ID</th>";
                echo "<th></th>";
                echo "<th>Product Name</th>";
                echo "<th>Quantity</th>";
                echo "<th>Price</th>";
                echo "<th>Order Date</th>";
                echo "<th>Status</th>";
                echo "</tr>";
                // Loop through the retrieved data and display it in the table
                foreach ($orderHistory as $order) {
                    echo "<tr>";
                    echo "<td>" . $order['id'] . "</td>";
                    echo "<td><img src='" . $order['img_link'] . "' width='100px' height='100px'></td>";
                    echo "<td>" . $order['product_name'] . "</td>";
                    echo "<td>" . $order['quantity'] . "</td>";
                    echo "<td>" . $order['price'] . "</td>";
                    echo "<td>" . $order['order_date'] . "</td>";
                    echo "<td>" . $order['status'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Your order history is empty<p>";
            }

            ?>

        </div>

    </div>
    <footer>
        <ul class="footer-links">
            <li><a href="faq.php">About Us</a></li>
            <li><a href="mailto:f31ee@localhost">Contact Us</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>

        <div class="footer-social">
            <a href="#"><img src="images/icons-facebook.png" alt="Facebook"></a>
            <a href="#"><img src="images/icons-twitter.png" alt="Twitter"></a>
            <a href="#"><img src="images/icons-instagram.png" alt="Instagram"></a>
        </div>
        <p><br>&copy; 2023 GEXE store</p>
    </footer>
</body>

</html>