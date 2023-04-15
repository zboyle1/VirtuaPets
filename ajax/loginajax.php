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
        session_destroy();
        setcookie("user",$_POST['user'],time() + (86400 * 30), "/");
        echo '1';
    } else {
        logout();
        echo '0';
    }
}

function logout() {
    session_destroy();
    setcookie("user","", time() - 3600, "/");
    echo '1';
}

function signup() {
    $user = $_POST['newuser'];
    $pass = $_POST['newpass'];
    $dob = $_POST['dob'];

    global $conn;
    
    $sql = "SELECT username FROM users WHERE username = '$user';";
    $result = $conn->query($sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo '1';
        return;
    }

    $insert = "INSERT INTO users (username, pass, birthdate, joindate) VALUES ('$user', '$pass','$dob', now());";
    $result = $conn->query($insert);

    $sql = "SELECT username FROM users WHERE username = '$user';";
    $result = $conn->query($sql);
    
    if (mysqli_num_rows($result) == 0) {
        echo '2';
        return;
    }

    session_destroy();
    setcookie("user",$user,time() + (86400 * 30), "/");
    echo '3';
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