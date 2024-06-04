<?php
session_start();
include "dbconnect.php";
if (isset($_SESSION['logged_in']) === true) {
    // User is logged in, can access user-specific data
    $username = $_SESSION['username'];

    $sql = "SELECT myname, username, DOB FROM users WHERE username = '" . $username . "'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    $myname = $row['myname'];
    $username = $row['username'];
    $DOB = $row['DOB'];
} else {
    // Redirect to the login page
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Account</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design.css">
    <style>
        .table-account,
        tr {
            text-align: center;
            width: 700px;
            border-radius: 10px;
            margin: auto;
            border: 1px solid #f9f9f9;
            background-color: #f9f9f9;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        td {
            text-align: center;
            width: 700px;
            border-radius: 10px;
            margin: auto;
        }

        .content_acc {
            padding: 5px 0px 0px 0px;
            text-align: center;

        }

        .acc_button {

            display: block;
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

        h2 {
            margin-top: 30px;
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
        <div class="content">
		<h2>My Account</h2>
        <br><br>
        <table class="table-account">
            <tr>
                <td>Name: <?php echo $myname ?></td>
            </tr>
            <tr>
                <td>Username: <?php echo $username ?></td>
            </tr>
            <tr>
                <td>Date of Birth: <?php echo $DOB ?></td>
            </tr>
        </table><br><br>

            <form action="order_history.php">
                <input class="form_button" type="submit" value="My Order History"><br><br>
            </form>
            <form action="logout.php">
                <input class="form_button" type="submit" value="Logout">
            </form>
            <br>
            <?php
            if ($username == 'admin@123') {
                echo "<form action='admin.php'>";
                echo "<input class='form_button' type='submit' value='Admin page'>";
                echo "</form>";
            }

            ?>
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
</body>

</html>