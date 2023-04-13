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
    <li><a href = "/~zboyle1/places/signup.php">Sign Up</a>
    </div>
    </div>
    <div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    <div class = "cell">
    GUESTLINKS;
}

function user_nav($user) {
    echo <<< USERLINKS
    <li><a href = "/~zboyle1/places/profile.php">My Pets</a>
    <li><a href = "/~zboyle1/places/inventory.php">Inventory</a>
    <li><a href = "/~zboyle1/places/createpet.php">Create a Pet</a>
    <li><a href = "/~zboyle1/places/shop.php">Shop</a>
    <li><a onclick = "logout()">Logout</a>
    </ul>
    </div>
    </div>
    <div id = "content" class = "grid-x grid-padding-x grid-margin-x">
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
        <title>Virtual Pets</title>

        <script src = "/~zboyle1/js/vendor/jquery.js"></script>
        <script src = "/~zboyle1/js/vendor/what-input.js"></script>
        <script src = "/~zboyle1/js/vendor/foundation.js"></script>
        <script src = "/~zboyle1/js/app.js"></script>

        <link rel = "stylesheet" href = "/~zboyle1/css/foundation.css">
        <link rel = "stylesheet" href = "/~zboyle1/css/app.css">

        <script src = "/~zboyle1/js/ajax.js"></script>

    </head>
    <body>
        <div class = "grid-container">
        <div class = "grid-x grid-padding-x">
           <div id ="logo" class = "cell">
                <h1>Logo</h1>
            </div>
        </div>
        <div class = "grid-x grid-padding-x">
            <div id = "welcome" class = "large-4 cell">
                Welcome, <?php echo (!isset($user) ? "guest!" : "$user!")?>
            </div>
            <div id = "nav" class = "cell auto">
                <ul class = "menu align-right">
                <li><a href = "/~zboyle1/index.php">Home</a>
<?php
    !isset($user) ? guest_nav() : user_nav($user)
?>