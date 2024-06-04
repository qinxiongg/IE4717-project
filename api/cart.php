<?php
session_start();
if (isset($_SESSION['logged_in']) === true) {
    // User is logged in, can access user-specific data
    $username = $_SESSION['username'];
}

if (isset($_GET['empty'])) {
    unset($_SESSION['cart']);
    header('location: ' . $_SERVER['PHP_SELF']);
    exit();
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
            padding: 5px 0px 0px 0px;
            margin: auto;
            text-align: center;
            width: 50%;
            height: 500px;
        }

        table.center {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        h2 {
            margin-top: 30px;
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

        tr,
        td {
            padding: 20px 40px 20px 40px;
        }

        .total td {
            border-top: black solid;
            text-align: right;
        }

        th {
            border-bottom: black solid;
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
                echo "<li>><a href='account_details.php'>$username</a></li>";
            } else {
                echo "<a href='login.php'><img src='images/login_icon.png' alt='login' style='width: 30px; height: 30px;'></a>";
            }
            ?>
            <a href="cart.php"><img src='images/cart_icon.png' alt='login' style='width: 30px; height: 30px;'></a>
        </div>
    </div>
    <div id="wrapper">

        <div class="content_cart">
            <h2>My Cart</h2>
            <br>

            <?php
            if (!isset($_SESSION['logged_in']) === true && !isset($_SESSION['username'])) {
                echo "<br><br><br>Please login before proceeding<br><br>";
                echo "<form action='login.php'>";
                echo "<input class='form_button' type='submit' value='Login'>";
                echo "<form>";
            } else {

                // Check if the 'cart' session variable exists and if it has any items
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $total_price = 0;

                    echo "<table class='center'>"; // Start the table
                    echo "<tr>";
                    echo "<th>Product Name</th>";
                    echo "<th>Quantity</th>";
                    echo "<th>Price</th>";
                    echo "<th>Subtotal</th>";
                    echo "</tr>";

                    // Loop through each item in the cart and display it in a table
                    foreach ($_SESSION['cart'] as $item) {
                        echo "<tr>";
                        echo "<td>" . $item['product_name'] . "</td>";
                        echo "<td>" . $item['quantity'] . "</td>";
                        echo "<td>$" . $item['price'] . "</td>";
                        echo "<td>$" . number_format($item['price'] * $item['quantity'], 2) . "</td>";
                        echo "</tr>";

                        $total_price += $item['price'] * $item['quantity'];
                    }
                    // price of items
                    echo "<tr class= total>
                    <td colspan='3' class= total><strong>Total</strong></td>
                    <td><strong>$" . number_format($total_price, 2) . "</strong></td>
                    </tr>";
                    echo "</table>";

                    echo "<br><br><p><a href='catalogue.php'>Continue Shopping</a> or 
                    <a href='" . $_SERVER['PHP_SELF'] . "?empty=1'>Empty your cart</a></p><br>";

                    echo "<form action='checkout.php' method='post'>"; // Start a form for checkout
                    echo "<button type='submit' class='button' value='Continue to Checkout'><span>Checkout </span></button>";
                    echo "</form>"; // End the form 
                    echo "<br><br><br>";
                } else {
                    echo "<br>Your cart is empty";
                    echo "<p><a href='catalogue.php'>Go to catalogue</a></p>";
                }
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