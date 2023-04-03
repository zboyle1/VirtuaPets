<?php

function isLoggedIn(): ?string {
    if(!isset($_COOKIE['userid'])) {
	    return null;
    } else {
        return $_COOKIE['userid'];
    }
}

function guest_nav() {
    echo <<< GUESTLINKS
    <li><a href = ""  onclick = "openLogin()">Login</a>
    <li><a href = "">Sign Up</a>
    <li><a href = "">Home</a>
    GUESTLINKS;
}

function user_nav($user) {
    echo <<< USERLINKS
    <li><a href = "">Home</a>
    <li><a href = "">Profile</a>
    <li><a href = "">My Pets</a>
    <li><a href = "">Shops</a>
    <li><a href = "">Logout</a>
    USERLINKS;
}

$user = isLoggedIn();
?>

<html>
    <head>
        <title>Virtual Pets<?php echo ($page != "home" ? "" : "- $page"); ?></title>
        <!-- jQuery -->
        <script src = "jquery-3.6.1.min.js"></script>
	
        <!-- Foundation -->
        <link rel = "stylesheet" href = "css/foundation.css">
        <link rel = "stylesheet" href = "css/app.css">

        <script src = "js/vendor/jquery.js"></script>
        <script src = "js/vendor/what-input.js"></script>
        <script src = "js/vendor/foundation.js"></script>
        <script src = "js/app.js"></script>
    </head>
    <body>
        <div class = "login-form" id = "login">
            <form onsubmit="return(loginpop())">
				Username: <input type="text" id="user"><br>
				Password: <input type="text" id="pass"><br>
				<input type="submit" class="button" value="Login">
                <input type="button" class="button" value="Sign-up">
                <input type="button" class="button" value="Cancel">
			</form>
            <div id="message"></div>
        </div>
        <div class = "grid-container">
        <div class = "grid-x">
           <div id = "cell small-12 medium-12 large-12">
                Logo
            </div>
        </div>
        <dix class = "grid-x">
            <div class = "cell medium-6 large-4">
                Welcome, <?php echo (!isset($user) ? "guest!" : "$user!")?>
            </div>
            <div class = "cell medium-6 large-8">
                <ul class = "menu">
<?php
    if(!isset($user)) {
        guest_nav();
    } else {
        user_nav($user);
    }
?>
                </ul>
            </div>
    <script>
        function loginpop() {

        }
        
        function login() {
            user = $("#user").val();
			pass = $("#pass").val();
            err = "";
            
            if( username != "" && password != "") {
			    $.post("./login.php",{"user": "user", "pass": pass },function(data) {
                  	if(response == 1) {
                        header("Location: index.php");
                    } else {
                        err = "Invalid login";
                        $("#message").html(data);
                    }
                    });
                return(false);
            }
        }
    </script>