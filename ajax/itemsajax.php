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
            $gold = $_SESSION["gold"];

            echo '<div class = "cell large-3">' .
                 '<a onclick = "buyconfirm(\'' . $id .', \'' . $itemname . '\', ' . $price . ', ' . $_SESSION["gold"] . ')">' .
                 '<div class = "card" style = "width: 150px;" id = "items">' .
                 //'<img src="/~zboyle1/assets/itemimg/' . $id . '.png">' .
                 '<img src="/~zboyle1/assets/itemimg/itemplaceholder.png" />' .
                 '<div class="card-section" text-align = "center">' .
                 '<p><b>' . $itemname . '</b></p>' .
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
    global $conn;
    
    $newgold = $_POST["price"] - $_SESSION["gold"];

    $userid = $_SESSION["userid"];
    $itemid = $_POST["itemid"];

    $update = "UPDATE users SET gold = $newgold WHERE id = 1";
    $result = $conn->query($update);

    if(!$result) {
        echo '0';
    }

    $_SESSION["gold"] = $newgold;

    $insert = "INSERT INTO inventory VALUES ($userid, $itemid);";
    $result = $conn->query($insert);

    if(!$result) {
        echo '0';
    }

    echo '1';
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