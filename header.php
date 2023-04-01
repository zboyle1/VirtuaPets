<?php

function isLoggedIn(): ?string {
    if(!isset($_COOKIE['userid'])) {
	    return null;
    } else {
        return $_COOKIE['userid'];
    }
}

function send_header(?string $page) {
?>
    <html>
    <head>
        <title>Virtual Pets<?php if($page != 'index') { echo "- $page"; } ?></title>
        <!-- jQuery -->
        <script src="jquery-3.6.1.min.js"></script>
	
        <!-- Foundation -->
        <link rel="stylesheet" href="css/foundation.css">
        <link rel="stylesheet" href="css/app.css">

        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>
    </head>
    <body>
<?php
    $user = isLoggedIn;
    if(!$user) {

    }

}
?>