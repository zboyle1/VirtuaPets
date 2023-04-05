<?php
	include '../header.php';
    include '../footer.php';
?>
        <div class = "cell small-12 medium-12 large-12">
            <form onsubmit="return(login())">
				Username: <input type="text" id="user"><br>
				Password: <input type="text" id="pass"><br>
				<input type="submit" class="button" value="Login">
                <input type="button" class="button" value="Sign-up">
                <input type="button" class="button" value="Cancel">
			</form>
            <div id="message"></div>
        </div>
<?php
    send_footer();
?>