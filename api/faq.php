<?php
session_start();
if (isset($_SESSION['logged_in']) === true) {
    // User is logged in, can access user-specific data
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FAQ</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        .faq {
            margin: auto;
        }

        th {
            vertical-align: top;
            text-align: right;
        }

        td {
            text-align: left;
            padding-left: 10px;
        }

        .content-top {
            margin: auto;
            text-align: center;
            background-color: #CF7650;
            padding-top: 30px;
            padding-bottom: 30px;
            color: white;

        }

        .content-bottom {
            width: 800px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-bottom: 70px;
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

        <div class="content-top">
            <h2><strong>About Us</strong></h2>
            <p><br>GEXE is an online IT store dedicated to providing a wide range of high-quality IT products, including laptops, tablets, smartphones and audio accessories.</p>
        </div><br><br>
        <div class="content-bottom">
            <h3><strong>Frequently asked Questions (FAQ)</strong></h3>
            <table class="faq">
                <br><br>
                <tr>
                    <th>Question:</th>
                    <td>How can I place an order?</td>
                </tr>
                <tr>
                    <th>Answer:</th>
                    <td>To place an order, simply browse our products, select the items you want, and
                        add them to your cart. Then, proceed to the checkout page to complete your purchase.<br><br></td>
                </tr>
                <tr>
                    <th>Question:</th>
                    <td>How do I track my order?</td>
                </tr>
                <tr>
                    <th>Answer:</th>
                    <td>You can track your order by logging into your account and accessing the order history section.<br><br></td>
                </tr>
                <tr>
                    <th>Question:</th>
                    <td>Are your products covered by a warranty?</td>
                </tr>
                <tr>
                    <th>Answer:</th>
                    <td>Yes, most of our products come with a standard manufacturer's warranty. The duration and
                        coverage may vary by product.<br><br></td>
                </tr>
                <tr>
                    <th>Question:</th>
                    <td>Are your products genuine/authentic?</td>
                </tr>
                <tr>
                    <th>Answer:</th>
                    <td>We guarantee that all our products are sourced directly from authorized distributors and are 100% authentic.<br><br></td>
                </tr>
                <tr>
                    <th>Question:</th>
                    <td>Do you offer technical support for purchased products?</td>
                </tr>
                <tr>
                    <th>Answer:</th>
                    <td>While we do not provide direct technical support, our dedicated customer service team can guide and advise you on the necessary steps to
                        contact the manufacturer or offer general advice on troubleshooting if needed. <br><br>
                    </td>
                </tr>
            </table>

        </div>

    </div>

</body>
<footer>
    <ul class="footer-links">
        <li><a href="faq.php">About Us</a></lsi>
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

</html>