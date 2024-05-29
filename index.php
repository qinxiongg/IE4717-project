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
    <title>GEXE Store</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        .image_grid {
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
            margin: 10px 70px 10px 70px;
        }

        .image_grid img {
            padding: 5px 5px 5px 5px;
            border: 2px double #000;
            margin: auto;

        }

        .image_grid2 {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .image_grid2 img {
            margin: auto;
        }

        .slider {
            width: 100%;
            height: 700px;
            border-radius: 0px;
            overflow: hidden;
        }

        .slides {
            width: 500%;
            height: 700px;
            display: flex;
        }

        .slides input {
            display: none;
        }

        .slide {
            width: 20%;
            transition: 2s;
        }

        .slide img {
            width: 100%;
            height: 700px;
        }


        .navigation-manual {
            position: absolute;
            width: 100%;
            margin-top: -40px;
            display: flex;
            justify-content: center;
        }

        .manual-btn {
            border: 2px solid #40D3DC;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }

        .manual-btn:not(:last-child) {
            margin-right: 40px;
        }

        .manual-btn:hover {
            background: #40D3DC;
        }

        #radio1:checked~.first {
            margin-left: 0;
        }

        #radio2:checked~.first {
            margin-left: -20%;
        }

        #radio3:checked~.first {
            margin-left: -40%;
        }

        #radio4:checked~.first {
            margin-left: -60%;
        }

        .navigation-auto {
            position: absolute;
            display: flex;
            width: 100%;
            justify-content: center;
            margin-top: 660px;
        }

        .navigation-auto div {
            border: 2px solid #40D3DC;
            padding: 5px;
            border-radius: 10px;
            transition: 1s;
        }

        .navigation-auto div:not(:last-child) {
            margin-right: 40px;
        }

        #radio1:checked~.navigation-auto .auto-btn1 {
            background: #40D3DC;
        }

        #radio2:checked~.navigation-auto .auto-btn2 {
            background: #40D3DC;
        }

        #radio3:checked~.navigation-auto .auto-btn3 {
            background: #40D3DC;
        }

        #radio4:checked~.navigation-auto .auto-btn4 {
            background: #40D3DC;
        }

        hr.line {
            border-top: 0.5px solid grey;
            width: 85%;
            margin: auto;
        }

        h3 {
            font-family: 'Ubuntu', 'sans-serif';
            text-align: center;
        }
    </style>
    <script type="text/javascript" src=""></script>
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

        <div class="slider">
            <div class="slides">

                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">


                <div class="slide first">
                    <img src="images/carousel_1.png" alt="">
                </div>
                <div class="slide">
                    <img src="images/carousel_2.png" alt="">
                </div>
                <div class="slide">
                    <img src="images/carousel_3.png" alt="">
                </div>
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>

                </div>
            </div>

            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>

            </div>
        </div><br><br>

        <h3>Hot Deals</h3><br>
        <h3>50% discount for all items</h3><br>
        <div class="image_grid">
            <img src="images/lenovo_laptop.jpg" width="200px" height="200px">
            <img src="images/apple_ipad.jpeg" width="200px" height="200px">
            <img src="images/macbook.jpg" width="200px" height="200px">
            <img src="images/sennheiser_1.jpg" width="200px" height="200px">
        </div><br>
        <hr class="line"><br><br>
        <h3>New products</h3><br>
        <div class="image_grid2">
            <img src="images/apple_iphone.png" width="200px" height="200px">
        </div>
    </div>
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
    <script>
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 3) {
                counter = 1;
            }
        }, 3000);
    </script>
</body>


</html>