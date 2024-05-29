<?php
include "dbconnect.php";
session_start();
if (isset($_SESSION['logged_in']) === true) {
    // User is logged in, can access user-specific data
    $username = $_SESSION['username'];
}

$product_name = $_POST['product_name'];

$sql = "SELECT product_desc, price, img_link FROM products WHERE product_name = '" . $product_name . "'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$product_desc = $row['product_desc'];
$price = $row['price'];
$img_link = $row['img_link'];

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $product_name = $_POST['product_name'];
        $quantity = $_POST['cartqty'];

        // Check if the cart session variable exists; if not, initialize it as an empty array.
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $_SESSION['cart'][] = array(
            'product_name' => $product_name,
            'quantity' => $quantity,
            'price' => $price,
            'img_link' => $img_link,
        );

        echo "<p class='banner'>Product added to cart!<p>";
    } else {
        echo "<p class='banner'>Please log in to add items to your cart.<p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $product_name ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        .product_cart {
            display: block;
        }

        .product_price {
            float: right;
            padding: 0px 500px 0px 0px;
        }

        .details {

            margin: 0px 0px 0px 600px;

        }

        .banner {
            background-color: #CF7650;
            color: #FFFFFF;
        }

        .product_details {
            padding: 5px 0px 0px 100px;
            float: left;
            min-height: 300px;
        }

        .cart_button {
            background-color: #D5A187;
            display: block;
            border-style: solid;
            border-color: #D5A187;
            width: 110px;
            height: 50px;
            color: #FFFFFF;
            font-family: 'Lato', 'san-serif';
            font-weight: bold;
            cursor: pointer;
            font-size: 100%;
        }

        h2 {
            margin-top: 50px;
            font: optional;
            text-transform: uppercase
        }

        h3 {
            font-family: 'Montserrat', Times, serif;
            font-size: 100%;
        }

        .product_desc {
            font-family: 'Montserrat', Times, serif;
            width: 800px;
            margin-bottom: 40px;
        }

        .quantity-input {
            display: flex;
            align-items: left;
            max-width: 150px;
            padding: 20px 10px 20px 10px;
        }

        .quantity-input input[type="number"] {
            width: 50px;
            padding: 8px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .quantity-input .quantity-btn {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
            border: 1px solid #ccc;
            cursor: pointer;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            margin: 0 5px;
        }

        .product_details img {
            margin-top: 40px;
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
        <div class="product_details">
            <?php echo "<img src='$img_link' width='350px' height='350px'>" ?>
        </div>
        <div class="details">
            <?php
            echo "<h2>$product_name</h2><br>";
            echo "<h3><b>$" . $price . "</b></h3><br>";
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label class="product_cart" for="cartqty">Quantity:</label>
                <div class="quantity-input">
                    <div class="quantity-btn" onclick="decreaseQuantity()">-</div>
                    <input type="number" id="quantity" name="cartqty" value="1" min="1">
                    <div class="quantity-btn" onclick="increaseQuantity()">+</div>
                </div>
                <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
                <input class="cart_button" type="submit" name="add_to_cart" value="Add to Cart"><br><br>
            </form>
            <h2>Description:</h2><br>
            <?php echo "<p class='product_desc'>$product_desc</p>"; ?>
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
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            if (currentValue < 10) {
                quantityInput.value = currentValue + 1;
            }
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
    </script>
</body>

</html>