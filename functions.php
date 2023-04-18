<?php

define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function isloggedin() {
    if (isset($_COOKIE['user'])) {
        return true;
    } else {
        return false;
    }
}

function startsession() {
    session_start();

    if(isloggedin()) {
        setusersession();
    } else {
        $_SESSION['user'] = false;
    }
}

function setusersession() {
    global $conn;
    
    if(!$_SESSION['hunger'] || !$_SESSION['joy']) {
        $_SESSION['hunger'] = 10;
        $_SESSION['joy'] = 10;
    }

    $user = $_COOKIE['user'];
    
    $sql = "SELECT * FROM users WHERE username = '$user';";
    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $_SESSION['userid'] = $row['id'];
    $_SESSION['user'] = $row['username'];
    $_SESSION['gold'] = $row['gold'];
    $_SESSION['active'] = $row['active_pet'];

    setcookie("gold", $row['gold'],time() + (86400 * 30), "/");

    mysqli_close($conn);
}

function decay($val, $lastupdate) {
    // in case i wanna change later
    $hours = time() - $lastupdate;
    $days = floor($hours / (60 * 60 * 24));
    $hours = $hours - $days * 60 * 60 * 24;
    $sincelast = $hours / (60 * 60);
    $newval = $val - $rate * $sincelast;

    return max(0, $newval);
}


function decaypetstats() {
    global $conn;

    if($_COOKIE['hunger'] > $_SESSION['hunger'] || $_COOKIE['joy'] > $_SESSION['joy']) {
        $_SESSION['hunger'] = $_COOKIE['hunger'];
        $_SESSION['joy'] = $_COOKIE['joy'];
    }

    $petid = $_SESSION['active'];

    $sql = "SELECT last_fed, last_play FROM pets WHERE pet_id = '$petid';";
    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $fed = $row['last_fed'];
    $play = $row['last_play'];

    $hunger = $_SESSION['hunger'];
    $joy = $_SESSION['joy'];

    $hunger = decay($_SESSION['hunger'], $fed);
    $joy = decay($_SESSION['joy'], $play);

    $_SESSION['hunger'] = $hunger;
    $_SESSION['joy'] = $joy;

    setcookie("hunger",$hunger,time() + (86400 * 30), "/");
    setcookie("joy",$joy,time() + (86400 * 30), "/");

    mysqli_close($conn);
}