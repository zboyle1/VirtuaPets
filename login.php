<?php
include 'dbconfig.php';

function isvalid ($user, $pass) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }	

    $sql = "SELECT * FROM User WHERE username = '$user' AND pass = '$pass'";
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

if(isvalid($_POST['user'], $_POST['pass'])) {
    setcookie("user",$_POST['userid'],time() + (86400 * 30), "/");
    echo "1";
} else {
    setcookie("user","", time() - 3600, "/");
    echo"2";
}