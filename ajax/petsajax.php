<?php
define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create a pet

function createpet() {
    $petname = $_POST['petname'];
    $species = $_POST['species'];
    $color = $_POST['color'];
    $gender = $_POST['gender'];
    $curruser = $_SESSION['userid'];
    
    global $conn;

    $insert = "INSERT INTO pets(user_id, pet_name, gender, species, color,  created, last_fed)
                VALUES ($curruser, '$petname', '$gender', '$species', '$color', curdate(), curdate());";
    $result = $conn->query($insert);

    $sql = "SELECT * FROM pets WHERE user_id = $curruser AND pet_name = '$petname';";
    $result = $conn->query($sql);

    if(mysqli_num_rows($result) == 0) {
        echo '0';
        return;
    }

    //makeactive($petname);

    echo '1';
}

// Show pets on profile

function showpet() {
    global $conn;

    $id = $_POST['id'];
    
    $select = "SELECT * FROM pets WHERE user_id = $id";
    $result = $conn->query($select);

    if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
            $petname = $row["pet_name"];
            $gender = $row["gender"];
            $species = $row["species"];
            $color = $row["color"];
            $birthdate = $row["created"];

            $age = date_diff(date_create($birthdate), date_create('now'))->d;
            
            echo '<div class = "cell large-2">'.
                 '<div class="card" style="width: 150px;" id="petstats">' .
                 '<div class="card-divider">' .
                 '<h4>' . $petname . '</h4>' .
                 '</div>' .
                 //'<img src="/~zboyle1/assets/petimg/' . $species . '/' . $color . '.png">' .
                 '<img src="/~zboyle1/assets/petimg/petplaceholder.png">' .
                 '<div class="card-section">' .
                 '<p>Species: ' . $species . '</p>' .
                 '<p>Color: ' . $color . '</p>' .
                 '<p>Gender: ' . $gender . '</p>' .
                 '<p>Age: ' . $age . ' days old</p>' .
                 '</div>'.
                 '</div>'.
                 '</div>';
        }
    } else {
        echo '<div class = "cell large-8">'.
             '<div class = "callout alert">User has no pets!</div>'.
             '</div>';
    }
}

/*

// Active pet functions

funtion showactive() {

}

function makeactive($petname) {

}

function changeactive() {

}

function itempet() {

}


*/

$cmd = $_POST['cmd'];

if($cmd == 'create') {
    createpet();
} else if ($cmd == 'show') {
    showpet();
}

mysqli_close($conn);