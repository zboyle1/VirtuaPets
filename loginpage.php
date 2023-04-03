<?php
	include 'header.php';
    include 'footer.php';
?>
        <div class = "x-grid">
            <form onsubmit="return(login())">
				Username: <input type="text" id="user"><br>
				Password: <input type="text" id="pass"><br>
				<input type="submit" class="button" value="Login">
                <input type="button" class="button" value="Sign-up">
                <input type="button" class="button" value="Cancel">
			</form>
            <div id="message"></div>
        </div>

    <script>
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
<?php
    send_footer();
?>