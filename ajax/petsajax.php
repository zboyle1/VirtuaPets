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
    $curruser = $_POST['id'];
    
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

    $user = $_POST['user'];

    $selectid = "SELECT id FROM users WHERE username ='$user'";
    $result = $conn->query($selectid);

    if (mysqli_num_rows($result) == 0) {
        echo '0';
        return;
    }

    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    
    
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

// Active pet functions

function showactive() {
    global $conn;

    $user = $_COOKIE['user'];

    $selectpet = "SELECT active_pet FROM users WHERE username = '$user';";
    $result = $conn->query($selectpet);

    $row = mysqli_fetch_assoc($result);
    $petid = $row['active_pet'];

    $sql = "SELECT * FROM pets WHERE pet_id = $petid;";
    $result = $conn->query($sql);

    if(mysqli_num_rows($result) == 0) {
        echo '<div class = "cell large-8">'.
             '<div class = "callout alert">You have no pets!</div>'.
             '</div>';
        return;
    }

    $row = mysqli_fetch_array($result);
    
    $petname = $row["pet_name"];
    $gender = $row["gender"];
    $species = $row["species"];
    $color = $row["color"];
    $birthdate = $row["created"];

    $age = date_diff(date_create($birthdate), date_create('now'))->d;

    echo '<div class="card" style="width: 150px;" id="petstats">' .
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
         //'<p> Hunger: ' . $hunger . '</p>' .
         //'<p> Joy: ' . $joy . '</p>' .
         '</div>'.
         '</div>'.
         '</div>';
}

function makeactive($petname) {
    global $conn;

    $user = $_COOKIE['user'];

    $selectid = "SELECT pet_id FROM pets WHERE petname = '$petname';";
    $result = $conn->query($selectid);

    if(mysqli_num_rows($result) == 0) {
        echo '0';
    }

    $row = mysqli_fetch_assoc($result);
    $petid = $row['pet_id'];

    $update = "UPDATE users SET ative_pet = $petid WHERE username = '$user';";
    $result = $conn->query($update);

    if(mysqli_num_rows($result) == 0){
        echo '0';
    } else {
        echo '1';
    }
}

/*
function itempet() {

}
*/

$cmd = $_POST['cmd'];

if($cmd == 'create') {
    createpet();
} else if ($cmd == 'show') {
    showpet();
} else if($cmd == 'active') {
    showactive();
} else if ($cmd == 'mkactive') {
    makeactive($_POST['petname']);
}

mysqli_close($conn);