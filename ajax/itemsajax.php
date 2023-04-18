<?php
define( 'DB_NAME', 'zboyle1' );
define( 'DB_USER', 'zboyle1' );
define( 'DB_PASSWORD', 'zboyle1' );
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Shop functions

function showallitems() {
    global $conn;

    $select = "SELECT * FROM itmes";
    $result = $conn->query($select);

    if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $itemname = $row["item_name"];
            $price = $row["price"];
            $gold = $_COOKIE["gold"];

            echo '<div class = "cell large-3">' .
                 '<a onclick = "buyconfirm(\'' . $id . '\', \'' . $itemname . '\', \'' . $price . '\', \'' . $gold . '\')">' .
                 '<div class = "card" style = "width: 150px;" id = "items">' .
                 '<img src="/~zboyle1/assets/itemimg/' . $id . '.png">' .
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

    // Variables
    global $conn;

    $user = $_COOKIE["user"];
    $itemid = $_POST["id"];

    $newgold = $_POST["gold"] - $_POST["price"];

    // Find userid
    $select = "SELECT id FROM users WHERE username = '$user'";
    $result = $conn->query($select);

    $row = mysqli_fetch_assoc($result);
    $userid = $row['id'];

    // Check if user has item
    $select = "SELECT quantity FROM inventory WHERE user_id = $userid AND item_id = $itemid;";
    $result = $conn->query($select);

    // If not, try to add item
    if(mysqli_num_rows($result) == 0) {

        $insert = "INSERT INTO inventory (user_id, item_id) VALUES ($userid, $itemid);";
        $result = $conn->query($insert);

        // Display error if cannot add
        if(mysqli_num_rows($result) == 0) {
            echo '0';
            return;
        }
    } else {
        // Add one to quantity of item
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity'];
        $quantity = $quantity + 1;

        // Update item quantity
        $update = "UPDATE inventory SET quantity = $quantity WHERE user_id = $userid AND item_id = $itemid;";

        // Return error if unable
        if($result = $conn->query($update) === FALSE) {
            echo '0';
            return;
        }
    }

    // Update gold amount if purchase went through
    $update = "UPDATE users SET gold = $newgold WHERE id = $userid";
    if($result = $conn->query($update) === FALSE) {
        echo '0';
        return;
    }

    $_SESSION["gold"] = $newgold;
    setcookie("gold", $newgold, time() + (86400 * 30), "/");

    echo '1';
}

// Show user inventory
function displayinv() {
    global $conn;

    $user = $_COOKIE['user'];

    $selectid = "SELECT id FROM users WHERE username = '$user';";
    $result = $conn->query($selectid);

    $row = mysqli_fetch_assoc($result);
    $userid = $row['id'];

    $select = "SELECT * FROM inventory JOIN itmes ON inventory.item_id = itmes.id WHERE user_id = $userid";
    $result = $conn->query($select);

    if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $itemname = $row["item_name"];
            $price = $row["price"];
            $quantity = $row["quantity"];
            $gold = $_COOKIE["gold"];

            echo '<div class = "cell large-3">' .
                 '<a onclick = "useanitem(\'' . $id . '\',\'' . $itemname . '\')">' .
                 '<div class = "card" style = "width: 150px;" id = "items">' .
                 '<img src="/~zboyle1/assets/itemimg/' . $id . '.png">' .
                 '<div class="card-section" text-align = "center">' .
                 '<p><b>' . $itemname . '</b></p>' .
                 '<p>' . $quantity . ' ct</p>' .
                 '</div>' .
                 '</div>' .
                 '</div>';
        }
    } else {
        echo '0';
    }
}



// Execute functions based on command
$cmd = $_POST['cmd'];

if($cmd == 'show') {
    showallitems();
} else if ($cmd == 'inv') {
    displayinv();
} else if ($cmd == 'buy') {
    buyitem();
}

mysqli_close($conn);