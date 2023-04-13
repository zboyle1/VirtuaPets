<?php
    $page = "Login";
	include '../header.php';
    include '../footer.php';
?>
            <form onsubmit="return(login())">
				<label>Username
                    <input type="text" id="user">
                </label>
				<label>Password
                    <input type="text" id="pass"></br>
                </label>
				<input type="submit" class="button" value="Login">
                <input type="button" class="button" value="Sign-up">
                <input type="button" class="button" value="Cancel">
			</form>
            <div id="message"></div>
<?php
    send_footer();
?>