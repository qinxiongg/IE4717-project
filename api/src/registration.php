<?php
session_start();
if (isset($_SESSION['logged_in']) === true) {
    // User is logged in, can access user-specific data
    $username = $_SESSION['username'];
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

        .register-form {
            width: 50%;
            margin: 0 auto;
            align-self: center;
            text-align: center;
        }

        .register-input {
            margin-bottom: 20px;
            width: 50%;
            padding: 10px;
            border: 1px solid #ccc;
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
            margin-bottom: 30px;
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

        .reg-container {
            margin-bottom: 50px;
        }

        .error-message {
            color: #FF0000;
            font-size: 0.7em;
            margin: 0 0 5 0px;
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

        <div class="content">
            <div class="register-form">
                <h2>Register Account</h2>
                <form action="register_acc.php" method="post" class="reg-container" onsubmit=" return validatesubmit()">
                    <br>
                    <label class="">Name</label><br>
                    <input type="text" class="register-input" name="myname" id="name" placeholder="Enter your name" oninput="validateName()" required><br>
                    <p id="nameError" class="error-message"></p>

                    <label class="">Date of birth</label><br>
                    <input type="date" name="DOB" class="register-input" id="myDate" oninput="validateDate()" required><br>
                    <span id="myDateError" class="error-message"> </span>
                    <br>
                    <label class="">Enter your email</label><br>
                    <input type="email" class="register-input" name="username" placeholder="Enter email" required><br>

                    <label class="">Password</label><br>
                    <input type="password" class="register-input" name="password" placeholder="Enter password" required><br>

                    <label class="">Password confirmation</label><br>
                    <input type="password" class="register-input" name="password2" placeholder="Repeat password" required><br><br><br>

                    <input type="reset" class="form_button" value="Reset">
                    <input type="submit" class="form_button" value="Register">
                    <br><br>
                </form>
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
        function validateDate() {

            var myDate = document.getElementById("myDate").value;
            var myDateError = document.getElementById("myDateError");

            // Get current Date
            var today = new Date();
            var selectedDate = new Date(myDate);

            if (selectedDate > today) {
                myDateError.innerHTML = "Date cannot be today's or a future date.";
                return false;
            } else {
                myDateError.innerHTML = " ";
                return true;
            }
        }

        function validateName() {

            var name = document.getElementById("name").value;
            var nameError = document.getElementById("nameError");


            var namechk = /^[A-Za-z]{3,}$/;
            if (namechk.test(name) == true) {
                nameError.innerHTML = "";
                return true;
            } else {
                nameError.innerHTML = "Name must contain alphabets and at least 3 characters.";
                return false;
            }

        }

        function validatesubmit() {

            var validDate = validateDate();
            if (validDate == false) {
                alert("Date cannot be today's or a future date.");
                return false;
            }

            var validName = validateName();
            if (validName == false) {
                alert("Name must contain alphabets and at least 3 characters.");
                return false;
            }
        }
    </script>
</body>

</html>