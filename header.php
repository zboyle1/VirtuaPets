<?php

function isLoggedIn(): ?string {
    if(!isset($_COOKIE['user'])) {
	    return null;
    } else {
        return $_COOKIE['user'];
    }
}

function guest_nav() {
    echo <<< GUESTLINKS
    <li><a href = "/~zboyle1/loginpage.php">Login</a>
    <li><a href = "">Sign Up</a>
    <li><a href = "/~zboyle1/index.php">Home</a>
    GUESTLINKS;
}

function user_nav($user) {
    echo <<< USERLINKS
    <li><a href = "/~zboyle1/index.php">Home</a>
    <li><a href = "/~zboyle1/places/profile.php">My Pets</a>
    <li><a href = "/~zboyle1/places/inventory.php">Inventory</a>
    <li><a href = "/~zboyle1/places/createpet.php">Create a Pet</a>
    <li><a href = "/~zboyle1/places/shop.php">Shop</a>
    <li><a onclick = "logout()">Logout</a>
    USERLINKS;
}

$user = isLoggedIn();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Virtual Pets<?php echo ($page != "home" ? "" : "- $page"); ?></title>
        <!-- jQuery -->
        <script src = "/~zboyle1/jquery-3.6.3.min.js"></script>
	
        <!-- Foundation -->
        <link rel = "stylesheet" href = "/~zboyle1/css/foundation.css">
        <link rel = "stylesheet" href = "/~zboyle1/css/app.css">

        <script src = "/~zboyle1/js/vendor/jquery.js"></script>
        <script src = "/~zboyle1/js/vendor/what-input.js"></script>
        <script src = "/~zboyle1/js/vendor/foundation.js"></script>
        <script src = "/~zboyle1/js/app.js"></script>
        
        <script>
            function logout() {
                $.post("login.php", {"cmd":"logout"}, function(data) {
                    window.location.href = "index.php";
                });
            }
        </script>
    </head>
    <body>
        <script>0</script>
        <div class = "grid-container">
        <div class = "grid-x">
           <div id = "cell small-12 medium-12 large-12">
                Logo
            </div>
        </div>
        <div class = "grid-x">
            <div class = "cell medium-6 large-4">
                Welcome, <?php echo (!isset($user) ? "guest!" : "$user!")?>
            </div>
            <div class = "cell medium-6 large-8">
                <ul class = "menu">
<?php
    if(!isset($user)) {
        guest_nav();
    } else {
        user_nav($user);
    }
?>
                </ul>
            </div>
        </div>