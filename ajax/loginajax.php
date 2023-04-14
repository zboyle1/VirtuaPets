<?php
define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function isvalid ($user, $pass) {	
    global $conn;

    $sql = "SELECT * FROM users WHERE username = '$user' AND pass = '$pass'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }	
}

function login() {
    if(isvalid($_POST['user'], $_POST['pass'])) {
        setcookie("user",$_POST['user'],time() + (86400 * 30), "/");
        echo '1';
    } else {
        logout();
        echo '0';
    }
}

function logout() {
    setcookie("user","", time() - 3600, "/");
    echo '1';
}

function signup() {
    $dob = $_POST['dob'];
    /* if(!isset($dob)) {
        echo '0';
        return;
    } */

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT username FROM users WHERE username = '$user'";
    $result = $conn->query($sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo '1';
        return;
    }

    $insert = "INSERT INTO users VALUES (NULL, '$user', '$pass', '$dob',current_time)";
    $result = $conn->query($insert);

    $sql = "SELECT username FROM users WHERE username = '$user'";
    $result = $conn->query($sql);
    
    if (mysqli_num_rows($result) == 0) {
        echo '2';
        return;
    }

    login();
    echo 'success';
}


$cmd = $_POST['cmd'];

if($cmd == 'login') {
    login();
} else if ($cmd == 'logout') {
    logout();
} else if ($cmd == 'signup') {
    signup();
}


mysqli_close($conn);