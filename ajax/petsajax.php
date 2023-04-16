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
    $curruser = $_SESSION['userid'];
    
    global $conn;

    $insert = "INSERT INTO pets(user_id, pet_name, gender, species, color,  created, last_fed)
                VALUES ($curruser, '$petname', '$gender', '$species', '$color', now(), now());";
    $result = $conn->query($insert);

    $sql = "SELECT * FROM pets WHERE user_id = $curruser AND pet_name = '$petname';";
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