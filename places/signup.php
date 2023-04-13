<?php
    $page = "Signup";
	include '../header.php';
    include '../footer.php';
?>
            <form onsubmit="return(signup())" id = "forms">
            <div class="large-6 cell">
				<label>Username
                    <input type="text" id="user">
                </label>
            </div>
            <div class="large-6 cell">
				<label>Password
                    <input type="text" id="pass">
                </label>
            </div>
            <div class="cell">   
                <label>Birthday 
                    <input type="date" id="dob">
                </label>
            </div>
            <div class="large-3 cell">
				<input type="submit" class="button" value="Sign-up">
            </div>
            <div class="large-3 cell">
                Have an account?<br>
                <input type="button" class="button" value="Login">
            </div>
			</form>
            <div id="message"></div>
<?php
    send_footer();
?>