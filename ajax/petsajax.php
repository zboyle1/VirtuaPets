<?php
define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function createpet() {
    $petname = $_POST['petname'];
    $species = $_POST['species'];
    $color = $_POST['color'];
    $gender = $_POST['gender'];
    $curruser = $_COOKIE['user'];
    
    global $conn;

    $selectid = "SELECT id FROM users WHERE username = '$curruser';";
    $userid = $conn->query($selectid);

    $row = mysqli_fetch_assoc($userid);
    $curruser = $row["id"];

    echo $curruser . $userid;

    $insert = "INSERT INTO pets(user_id, pet_name, species, color, created, last_fed)
                VALUES ('$curruser', '$petname', '$species', '$color', '$gender');";
    $result = $conn->query($insert);

    $sql = "SELECT * FROM pets WHERE user_id == '$userid' AND petname == '$petname';";
    $result = $conn->query($sql);

    if(mysqli_num_rows($result) == 0) {
        echo '0';
        return;
    }

    echo '1';
}

/*
function feepet() {

}

function showpet() {

}
*/

$cmd = $_POST['cmd'];

if($cmd == 'create') {
    createpet();
}
mysqli_close($conn);