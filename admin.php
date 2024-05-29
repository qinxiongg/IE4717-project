<?php
session_start();
include "dbconnect.php";

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $username = $_SESSION['username'];

    // Check if the user is an admin
    if ($username != 'admin@123') {
        // Redirect to a different page since the user is not an admin
        header('Location: account_details.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        h2 {
            margin-top: 30px;
            margin-bottom: 50px;
            text-align: center;
        }

        .admin {
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
        <h2>Admin</h2>
        <p>All order history are shown here<br><br></p>
        <div class="admin">

            <?php
            $sql = "SELECT * FROM orders";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Customer</th>";
                echo "<th>Product</th>";
                echo "<th>Quantity</th>";
                echo "<th>Order Date</th>";
                echo "<th>Status</th>";
                echo "<th></th>";
                echo "</tr>";

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $product_name = $row['product_name'];
                    $quantity = $row['quantity'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];

                    echo "<tr>";
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $username . "</td>";
                    echo "<td>" . $product_name . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>" . $order_date . "</td>";
                    echo "<td>" . $status . "</td>";
                    echo "<td>";
                    echo "<form action='modifyorderstatus.php' method='post'>";
                    echo "<select name='status' id='status'>";
                    echo "<option value='processing'>processing</option>";
                    echo "<option value='processed'>processed</option>";
                    echo "<option value='On delivery'>On delivery</option>";
                    echo "<option value='Delivered'>Delivered</option>";
                    echo "</select>";
                    echo "<input type='hidden' value='$username' name='username'>";
                    echo "<input type='hidden' value='$id' name='id'>";
                    echo "<input type='submit' value='Submit'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<div class='content'>0 results</div>";
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