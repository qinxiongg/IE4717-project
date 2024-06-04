<?php
session_start();
if (isset($_SESSION['logged_in']) === true) {
    // User is logged in, can access user-specific data
    $username = $_SESSION['username'];
    header('Location: account_details.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        h2 {
            margin-top: 50px;
            margin-bottom: 40px;
        }

        .login-input {
            margin-bottom: 20px;
            width: 50%;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .login_container {
            width: 50%;
            margin: 0 auto;
            align-self: center;
            text-align: center;
            margin-bottom: 5px;
            min-height: 500px;
        }


        p {
            color: grey;
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
    <div class="wrapall">
        <div id="wrapper">
            <div class="login_container">
                <h2>Log in with Email</h2>
                <form action="authmain.php" method="post">
                    <input type="email" class="login-input" name="username" placeholder="Email" required>
                    <input type="password" class="login-input" name="password" placeholder="Password" required><br>
                    <input class="form_button" type="submit" value="Login"><br>
                </form>
                <hr class="line"><br><br>
                <p>New here? Register your account!</p><br>
                <form action="registration.php">
                    <input class="form_button" type="submit" value="Register">
                </form>
                <br>
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
</body>

</html>