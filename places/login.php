<?php
    $page = "Login";
	include '../header.php';
    include '../footer.php';
?>
<div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    <div class="cell large-8 medium-6 small-4">  
    <form onsubmit="return(login())">

		<label>Username
            <input type="text" id="user">
        </label>
		<label>Password
            <input type="text" id="pass"></br>
        </label>
        <button class = "submit button">Login</button>
        <a href = "/~zboyle1/places/signup.php" class="button secondary">Sign up</a>
        <div id="message"></div>
	</form>
    </div>
</div>
<?php
    send_footer();
?>