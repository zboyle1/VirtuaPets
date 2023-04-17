<?php
define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

// Connect to SQL server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Login function

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

// Signup

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

    $insert = "INSERT INTO users (username, pass, birthdate, joindate) VALUES ('$user', '$pass','$dob', curdate());";
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

// Show user information

function showuser() {

    global $conn;

    $user = $_POST['user'];

    $select = "SELECT * FROM users WHERE username = '$user';";
    $result = $conn->query($select);

    if (mysqli_num_rows($result) == 0) {
        echo '0';
        return;
    }

    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $dob = $row['birthdate'];
    $join = $row['joindate'];
    $age = date_diff(date_create($dob), date_create('now'))->y;
    $join = explode("-", $join);
    
    echo '<table class = "unstriped" id = "usertable"><tr>' .
         '<td align = "center">Username:</td>' .
         '<td>' . $user . '</td>' .
         '</tr><tr>' .
         '<td align = "center">Age:</td>' .
         '<td>' . $age . '</td>' .
         '</tr><tr>' .
         '<td align = "center">Join date:</td>' .
         '<td>' . $join[1] . '/' . $join[2] . '/' . $join[0] . '</td>' .
         '</tr></table>';
}

// Execute function

$cmd = $_POST['cmd'];

if($cmd == 'login') {
    login();
} else if ($cmd == 'logout') {
    logout();
} else if ($cmd == 'signup') {
    signup();
} else if ($cmd == 'show') {
    showuser();
}


mysqli_close($conn);