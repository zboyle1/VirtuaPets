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
				<input type="submit" class="button" value="Login">
            </div>
            <div class="large-3 cell">
                <input type="button" class="button" value="Sign-up">
            </div>
			</form>
            <div id="message"></div>
<?php
    send_footer();
?>