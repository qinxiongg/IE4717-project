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
        .catalogue_container {
            margin-bottom: 50px;

        }

        .container img {
            width: 200px;
            /* Ensure images take the full width of the container */
            height: 200px;
            /* Maintain aspect ratio */
            border: 2px double #000;
            margin: 20px 20px 20px 20px;
        }

        .filterDiv {
            display: none;
            /* Hidden by default */
        }

        .show {
            display: inline-block;
        }

        .filterbtn {
            border: none;
            outline: none;
            padding: 12px 16px;
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .filterbtn:hover {
            background-color: #ddd;
        }

        .filterbtn.active {
            background-color: #666;
            color: white;
        }

        .container .btn {
            position: absolute;
            bottom: 25px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #CF7650;
            color: white;
            font-size: 14px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .btn {
            background-color: #CF7650;
            font-family: 'ubuntu';
            color: white;
            width: 210px;
        }

        .btn:hover {
            background-color: #D5A187;
        }

        .container {
            background-color: transparent;
        }

        .image_grid {
            margin: 20px auto;
            width: 80%;
            overflow: hidden;
            text-align: center;
        }

        .image_grid img {
            padding: 5px 5px 5px 5px;
            border: 2px double #000;
            margin: 20px 20px 20px 20px;
        }

        h4 {
            margin-top: 20px;
            margin-bottom: 20px;
            font-family: 'Ubuntu', 'sans-serif';
            text-align: center;
            font-size: 300%;
        }

        #myBtnContainer {
            width: 50%;
            margin: auto;
            text-align: center;
        }

        .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-container img {
            border: 2px double #000;
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

        <h4> Products on sale</h4>
        <div id="myBtnContainer">
            <button class="filterbtn active" onclick="filterSelection('all')"> Show all</button>
            <button class="filterbtn" onclick="filterSelection('Laptops')"> Laptops</button>
            <button class="filterbtn" onclick="filterSelection('Tablets')"> Tablets</button>
            <button class="filterbtn" onclick="filterSelection('Phones')"> Phones</button>
            <button class="filterbtn" onclick="filterSelection('Audio')"> Audio</button>
        </div>
        <div class="catalogue_container">
            <div class="image_grid">
                <form id="myForm" action="product_details.php" method="post">
                    <span class="container filterDiv Laptops">
                        <div class="image-container">
                            <img src="images/asus_laptop.jpg">
                            <input type="submit" name="product_name" class="btn" value="Asus Zenbook 14">
                        </div>
                    </span>
                    <span class="container filterDiv Tablets">
                        <div class="image-container">
                            <img src="images/apple_ipad.jpeg">
                            <input type="submit" name="product_name" class="btn" value="Apple iPad Air">
                        </div>
                    </span>
                    <span class="container filterDiv Audio">
                        <div class="image-container">
                            <img src="images/sennheiser_1.jpg">
                            <input type="submit" name="product_name" class="btn" value="Sennheiser HD 600">
                        </div>
                    </span>
                    <span class="container filterDiv Audio">
                        <div class="image-container">
                            <img src="images/jbl.jpg">
                            <input type="submit" name="product_name" class="btn" value="JBL Jr310BT">
                        </div>
                    </span>
                    <span class="container filterDiv Laptops">
                        <div class="image-container">
                            <img src="images/macbook.jpg">
                            <input type="submit" name="product_name" class="btn" value="Apple MacBook Pro 16">
                        </div>
                    </span>
                    <span class="container filterDiv Audio">
                        <div class="image-container">
                            <img src="images/sennheiser_2.jpg">
                            <input type="submit" name="product_name" class="btn" value="Sennheiser HD 400S">
                        </div>
                    </span>
                    <span class="container filterDiv Tablets">
                        <div class="image-container">
                            <img src="images/samsung_tablet.jpg">
                            <input type="submit" name="product_name" class="btn" value="Samsung Galaxy Tab S9 Ultra">
                        </div>
                    </span>
                    <span class="container filterDiv Laptops">
                        <div class="image-container">
                            <img src="images/lenovo_laptop.jpg">
                            <input type="submit" name="product_name" class="btn" value="Lenovo IdeaPad">
                        </div>
                    </span>
                    <span class="container filterDiv Phones">
                        <div class="image-container">
                            <img src="images/apple_iphone.png">
                            <input type="submit" name="product_name" class="btn" value="Apple iPhone 15">
                        </div>
                    </span>
                    <span class="container filterDiv Laptops">
                        <div class="image-container">
                            <img src="images/galaxybook3pro.png">
                            <input type="submit" name="product_name" class="btn" value="Samsung Galaxy Book3 Pro">
                        </div>
                    </span>
                    <span class="container filterDiv Audio">
                        <div class="image-container">
                            <img src="images/galaxybuds2pro.png">
                            <input type="submit" name="product_name" class="btn" value="Samsung Galaxy Buds2">
                        </div>
                    </span>
                </form>
            </div><br>
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
        filterSelection("all")

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        // Show filtered elements
        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        // Hide elements that are not selected
        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Add active class to the current control button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("filterbtn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
</body>

</html>