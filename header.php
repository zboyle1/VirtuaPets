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
    <li><a href = "/~zboyle1/places/login.php">Login</a>
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

        <link rel = "stylesheet" href = "/~zboyle1/css/foundation.css">
        <link rel = "stylesheet" href = "/~zboyle1/css/app.css">

        <script src = "/~zboyle1/js/vendor/jquery.js"></script>
        <script src = "/~zboyle1/js/vendor/what-input.js"></script>
        <script src = "/~zboyle1/js/vendor/foundation.js"></script>
        <script src = "/~zboyle1/js/app.js"></script>
        <script src = "/~zboyle1/js/ajax.js"></script>
    
    </head>
    <body>
        <div class = "grid-container" id = "container-wrapper">
        <div class = "grid-x">
           <div class = "cell small-12 medium-12 large-12" id = "logo">
                <h1>Logo</h1>
            </div>
        </div>
        <div class = "grid-x">
            <div class = "cell medium-6 large-4" id = "welcome">
                Welcome, <?php echo (!isset($user) ? "guest!" : "$user!")?>
            </div>
            <div class = "cell medium-6 large-8" id = "nav">
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