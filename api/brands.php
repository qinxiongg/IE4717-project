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
    <title>Our IT Store</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        .brands {
            border-collapse: collapse;
            width: 100%;
        }

        .brands td {
            padding: 20px;
            border: 1px solid #ccc;
        }

        .brands img {
            max-width: 100px;
            max-height: 100px;
        }

        .brands td[rowspan="2"] {
            background-color: #ffffff;
            color: #000000;
            border: none;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: 1.5em;
        }

        .table-container {
            text-align: center;
            margin: auto;
            width: 700px;
        }

        h5 {
            font-family: 'Ubuntu', 'sans-serif';
            text-align: center;
            font-size: 300%;
        }

        hr.line {
            border-top: 0.5px solid grey;
            width: 85%;
            margin: auto;
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
    </div>
    <div id="wrapper">
        <h5>Brands</h5><br><br>
        <div class="table-container">
            <table class="brands">
                <tr>
                    <td rowspan="2"><img src="images/apple_logo.jpg" alt="Apple Logo">
                        Think Different.
                    </td>
                    <td><img src="images/apple_ipad.jpeg" alt="Apple iPad"></td>
                    <td><img src="images/macbook.jpg" alt="Macbook"></td>
                </tr>
                <tr>

                    <td colspan="2"><img src="images/apple_iphone.png" alt="Apple iPhone"></td>
                </tr>
            </table>
        </div>
        <br><br>
        <hr class="line"><br><br>
        <div class="table-container">
            <table class="brands" background="red">
                <tr>
                    <td rowspan="2"><img src="images/samsung_logo.jpg" alt="Samsung Logo">
                        Together for tomorrow</td>
                    <td><img src="images/samsung_tablet.jpg" alt="Samsung Tablet"></td>
                    <td><img src="images/galaxybook3pro.png" alt="Galaxy Book 3 Pro"></td>
                </tr>
                <tr>


                    <td colspan="2"><img src="images/galaxybuds2pro.png" alt="Galaxy Buds 2 Pro"></td>
                </tr>
            </table>
        </div>
        <br><br>
        <hr class="line"><br><br>
        <div class="table-container">
            <table class="brands" background="red">
                <tr>
                    <td rowspan="2"><img src="images/sennheiser_logo.png" alt="Sennheiser Logo">
                        We Shape The Future</td>
                    <td><img src="images/sennheiser_1.jpg" alt="Sennheiser 1"></td>
                    <td><img src="images/sennheiser_2.jpg" alt="Sennheiser 2"></td>
                </tr>

            </table>
        </div>
        <br><br>
        <hr class="line"><br><br>
        <div class="table-container">
            <table class="brands" background="red">
                <tr>
                    <td rowspan="2"><img src="images/lenovo_logo.png" alt="Lenovo Logo">
                        Innovation Never Stands Still</td>
                    <td><img src="images/lenovo_laptop.jpg" alt="Lenovo Laptop"></td>
                </tr>

            </table>
        </div>
        <br><br>
        <hr class="line"><br><br>
        <div class="table-container">
            <table class="brands" background="red">
                <tr>
                    <td rowspan="2"><img src="images/asus_logo.png" alt="Asus Logo">
                        Inspiring Innovation. Persisting Perfection</td>
                    <td><img src="images/asus_laptop.jpg" alt="Asus Laptop"></td>
                </tr>

            </table>
        </div>
        <br><br>
        <hr class="line"><br><br>
        <div class="table-container">
            <table class="brands" background="red">
                <tr>
                    <td rowspan="2"><img src="images/jbl_logo.png" alt="JBL Logo">
                        Dare To Listen</td>
                    <td><img src="images/jbl.jpg" alt="JBL"></td>
                </tr>

            </table>
        </div>
        <br><br>
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
    </div>
</body>

</html>