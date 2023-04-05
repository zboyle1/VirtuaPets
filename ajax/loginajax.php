<?php
define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

function isvalid ($user, $pass) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }	

    $sql = "SELECT * FROM users WHERE username = '$user' AND pass = '$pass'";
    $result = $conn->query($sql);
    
    // Check for user name
    if (mysqli_num_rows($result) == 0) {
        mysqli_close($conn);

        return false;
    } else {
        mysqli_close($conn);
        return true;
    }	
}

function login() {
    if(isvalid($_POST['user'], $_POST['pass'])) {
        setcookie("user",$_POST['user'],time() + (86400 * 30), "/");
        echo "1";
    } else {
        logout();
        echo "0";
    }
}

function logout() {
    setcookie("user","", time() - 3600, "/");
    echo "1";
}

$cmd = $_POST['cmd'];

if($cmd == 'login') {
    login();
} else if ($cmd == 'logout') {
    logout();
}