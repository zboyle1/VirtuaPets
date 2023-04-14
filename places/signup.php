<?php
    $page = "Signup";
	include '../header.php';
    include '../footer.php';
?>
<div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    
    <div class="cell large-8 medium-6 small-4">    
    <form onsubmit="return(signup())">
		<label>Username
            <input type="text" id="user">
        </label>
		<label>Password
            <input type="text" id="pass">
        </label>
        <label>Birthday 
            <input type="date" id="dob">
        </label>
		<button class = "submit button">Sign up</button>
        <a href = "/~zboyle1/places/login.php" class="button secondary">Login</a>
        <div id="message"></div>
	</form>
    </div>
</div>
<?php
    send_footer();
?>