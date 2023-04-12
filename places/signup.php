<?php
    $page = "Signup";
	include '../header.php';
    include '../footer.php';
?>
            <form onsubmit="return(Signup())">
				Username: <input type="text" id="user"><br>
				Password: <input type="text" id="pass"><br>
                Birthday: <input type="text" id="pass"><br>
				<input type="submit" class="button" value="Login">
                <input type="button" class="button" value="Sign-up">
                <input type="button" class="button" value="Cancel">
			</form>
            <div id="message"></div>
<?php
    send_footer();
?>