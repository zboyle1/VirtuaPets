<?php
include 'functions.php';
include 'petsidebar.php';

if (session_status() == PHP_SESSION_NONE) {
    startsession();
}

decaypetstats();

function guest_nav() {
    echo <<<GUESTLINKS
    <ul class="vertical menu">
    <li><a href="/~zboyle1/index.php">Home</a></li>
    <li><a href="/~zboyle1/places/login.php">Login</a></li>
    <li><a href="/~zboyle1/places/signup.php">Sign Up</a></li>
    </ul>
GUESTLINKS;
}

function user_nav($user) {
    echo <<<USERLINKS
    <p>Gold: {$_SESSION['gold']} </p>
    <ul class="vertical menu">
    <li><a href="/~zboyle1/index.php">Home</a></li>
    <li><a href="/~zboyle1/places/profile.php?user={$_SESSION['user']}">My Pets</a></li>
    <li><a href="/~zboyle1/places/inventory.php">Inventory</a></li>
    <li><a href="/~zboyle1/places/createpet.php">Create a Pet</a></li>
    <li><a href="/~zboyle1/places/shop.php">Shop</a></li>
    <li><a onclick="logout()">Logout</a></li>
    </ul>
    USERLINKS;
    activepet();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Virtual Pets</title>

        <link rel="stylesheet" href="/~zboyle1/css/foundation.css">
        <link rel="stylesheet" href="/~zboyle1/css/app.css">
        <link rel="stylesheet" href="/~zboyle1/jqueryconfirm/jquery-confirm.min.css">

        <script src="/~zboyle1/js/vendor/jquery.js"></script>
        <script src="/~zboyle1/js/vendor/what-input.js"></script>
        <script src="/~zboyle1/js/vendor/foundation.js"></script>
        <script src="/~zboyle1/jqueryconfirm/jquery-confirm.min.js"></script>
        <script src="/~zboyle1/js/ajax.js"></script>
        <script src="/~zboyle1/js/app.js"></script>            
    </head>
    
    <body>
        <div class="grid-container xy-grid">
            <div class="grid-x grid-padding-x">
                <div id="logo" class="cell">
                    <h1>Logo</h1>
                </div>
            </div>

            <div id="content" class="grid-x grid-margin-x">

                <div class="cell large-2 medium-2 small-2 cell-auto-height">
                    <?php !$_SESSION['user'] ? guest_nav() : user_nav($user); ?>
                </div>