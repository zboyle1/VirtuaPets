<?php
    $page = "Login";
	include '../header.php';
    include '../footer.php';
?>
            <form onsubmit="return(login())" id = "forms">
            <div class="large-6 cell">
				<label>Username
                    <input type="text" id="user">
                </label>
            </div>
            <div class="large-6 cell">
				<label>Password
                    <input type="text" id="pass"></br>
                </label>
            </div>
            <div class="large-3 cell">
            <button class = "submit button">Log-in</button>
                <a href = "/~zboyle1/places/signup.php" class="button secondary">Sign up</a>
            </div>
            <div id="message"></div>
			</form>
<?php
    send_footer();
?>