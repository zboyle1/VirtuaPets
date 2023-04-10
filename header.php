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
    </div>
    </div>
    <div class = "grid-x">
    <div class = "cell">
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
    </ul>
    </div>
    </div>
    <div class = "grid-x">
    USERLINKS;

    include '/~zboyle1/petsidebar.php';
?>
    <div class = "small-6 medium-8 large-10 cell">
<?php
}

$user = isLoggedIn();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Virtual Pets<?php echo (!isset($page) ? "" : "- $page"); ?></title>
        <script src = "/~zboyle1/jquery-3.6.3.min.js"></script>

        <script src = "/~zboyle1/js/ajax.js"></script>

        <script src = "/~zboyle1/js/vendor/jquery.js"></script>
        <script src = "/~zboyle1/js/vendor/what-input.js"></script>
        <script src = "/~zboyle1/js/vendor/foundation.js"></script>
        <script src = "/~zboyle1/js/app.js"></script>

        <link rel = "stylesheet" href = "/~zboyle1/css/foundation.css">
        <link rel = "stylesheet" href = "/~zboyle1/css/app.css">
    
    </head>
    <body>
        <div class = "grid-container">
        <div class = "grid-x">
           <div class = "cell">
                <h1>Logo</h1>
            </div>
        </div>
        <div class = "grid-x">
            <div class = "medium-6 large-4 cell" id = "welcome">
                Welcome, <?php echo (!isset($user) ? "guest!" : "$user!")?>
            </div>
            <div class = "medium-6 large-8 cell">
                <ul class = "menu">
<?php
    !isset($user) ? guest_nav() : user_nav($user)
?>