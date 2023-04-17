<?php

define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

function isLoggedIn() {
    if (isset($_COOKIE['user'])) {
        return true;
    } else {
        return false;
    }
}

function startsession() {
    session_start();

    if(isLoggedin()) {
        set_usersession();
    } else {
        $_SESSION['user'] = false;
    }
}

function set_usersession() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $user = $_COOKIE['user'];
    
    $sql = "SELECT * FROM users WHERE username = '$user';";
    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $_SESSION['userid'] = $row['id'];
    $_SESSION['user'] = $row['username'];
    $_SESSION['gold'] = $row['gold'];
    $_COOKIE['gold'] = $row['gold'];
}