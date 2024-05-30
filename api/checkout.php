<?php
session_start();
include "dbconnect.php";
if (isset($_SESSION['logged_in']) === true) {
    // User is logged in, can access user-specific data
    $username = $_SESSION['username'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        .content_cart {
            margin: auto;
            text-align: center;
            width: 700px;
        }

        table.center {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        .cart_total {
            margin: auto;
            margin-top: 50px;
            padding: 30px 30px 30px 30px;
            width: 50%;
            background-color: #f9f9f9;
            border-radius: 10px;
            margin-bottom: 30px;

        }

        .checkout_container {
            margin: auto;
            width: 80%;
        }

        tr,
        td {
            padding: 20px 40px 20px 40px;
            vertical-align: middle;
        }

        th {
            border-bottom: grey solid;
        }

        .form_button {
            margin: auto;
            display: block;
            background-color: #FFFFFF;
            color: #CF7650;
            font-weight: bold;
            border-radius: 5px;
            border-width: medium;
            border-color: #CF7650;
            border-style: solid;
            font-size: 1em;
            width: 320px;
            height: 40px;
            font-family: 'Lato', 'san-serif';
        }

        .form_button:hover {
            background-color: #CF7650;
            color: white;
            cursor: pointer
        }

        .totalamt td {
            border-top: solid grey;
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
        <div class="checkout_container">
            <div class="content_cart">
                <br><br>
                <h2>Checkout</h2>
                <br><br>

                <?php
                if (!isset($_SESSION['logged_in']) === true && !isset($_SESSION['username'])) {
                    echo "Please login before proceeding";
                } else {

                    // Check if the 'cart' session variable exists and if it has any items
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $total_price = 0;

                        echo "<table class='center'>";
                        echo "<tr>";
                        echo "<th>";
                        echo "<th>Product Name</th>";
                        echo "<th>Quantity</th>";
                        echo "<th>Subtotal</th>";
                        echo "</tr>";

                        // Loop through each item in the cart and display it in a table
                        foreach ($_SESSION['cart'] as $item) {

                            echo "<tr>";
                            echo "<td><img src='" . $item['img_link'] . "' width='100px' height='100px'></td>";
                            echo "<td>" . $item['product_name'] . "</td>";
                            echo "<td>" . $item['quantity'] . "</td>";
                            echo "<td>$" . number_format($item['price'] * $item['quantity'], 2) . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<br><br>";
                        echo "<form action='cart.php' method='post'>";
                        echo "<input class='form_button' type='submit' value='Go Back to Cart'>";
                        echo "</form>";
                    } else {
                        echo "<br>Your cart is empty";
                        echo "<p><a href='catalogue.php'>Go to catalogue</a></p>";
                    }
                }
                ?>
            </div>
            <br>
            <hr>
            <div class="cart_total">
                <?php
                echo "<table class='center'>";
                foreach ($_SESSION['cart'] as $item) {
                    echo "<tr>";
                    echo "<td colspan='2'>" . $item['product_name'] . "</td>";
                    echo "<td>$" . $item['price'] . "</td>";
                    echo "</tr>";
                    echo "<br>";
                    $total_price += $item['price'] * $item['quantity'];
                }
                // price of items
                echo "<tr class='totalamt'><td colspan='2'><strong>Total</strong></td>
                <td><strong>$" . number_format($total_price, 2) . "</strong><br></td></tr>";
                echo "</table>"; // End the table
                echo "<form action='after_checkout.php' method='post' onsubmit='displaySuccessMessage()'>";
                echo "<input type='submit' class='form_button' name='proceed_to_payment' value='Proceed to Payment'>";
                echo "</form>";
                ?>
            </div>
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
    <script>
        // Function to display the success message as a pop-up
        function displaySuccessMessage() {
            alert("Your order is successful! Redirecting you to your order history.");
        }
    </script>
</body>

</html>