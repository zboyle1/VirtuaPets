<?php
define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function showallitems() {
    global $conn;

    $select = "SELECT * FROM itmes";
    $result = $conn->query($select);

    if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $itemname = $row["item_name"];
            $price = $row["price"];

            echo '<div class = "cell large-3" onclick = "buyitem(' . $id . ')">' .
                 '<div class = "card" style = "width: 150px;" id = "items">' .
                 //'<img src="/~zboyle1/assets/itemimg/' . $id . '.png">' .
                 '<img src="/~zboyle1/assets/itemimg/itemplaceholder.png">' .
                 '<div class="card-section" text-align = "center">' .
                 '<p class = "h6">' . $itemname . '</p>' .
                 '<p>' . $price . ' Gold</p>' .
                 '</div>' .
                 '</div>' .
                 '</div>';
        }
    } else {
        echo '0';
    }
}

function buyitem() {

}
// Execute functions based on command
$cmd = $_POST['cmd'];

if($cmd == 'show') {
    showallitems();
} else if ($cmd == 'showinv') {
    //showuserinv();
} else if ($cmd == 'buy') {
    buyitem();
}

mysqli_close($conn);