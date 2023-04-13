<?php
    $page = "Signup";
	include '../header.php';
    include '../footer.php';
?>
            <form onsubmit="return(Signup())">
				<label>Username
                    <input type="text" id="user">
                </label>
				<label>Password
                    <input type="text" id="pass"><br>
                </label>
                <label>Birthday 
                    <input type="number" id="month" placeholder = "MM">
                    <input type="number" id="day" placeholder = "DD">
                    <input type="number" id="year" placeholder = "YYYY"><br>
                </label>
				<input type="submit" class="button" value="Sign-up">
                <label> Have an account?
                    <input type="button" class="button" value="Login">
                </label>
			</form>
            <div id="message"></div>
<?php
    send_footer();
?>