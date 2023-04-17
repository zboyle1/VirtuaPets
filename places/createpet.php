<?php
    $page = "Create a pet";
	include '../header.php';
    include '../footer.php';
    $user = $_COOKIE['user'];
?>
<div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    <div class = "cell">
        <h3>Create a pet</h3>
    </div>

    <div class = "cell small-5 medium-4 large-4 align-self-middle">
        <img class = "thumbnail" id = "newpet" src="/~zboyle1/assets/petimg/petplaceholder.png">
    </div>

    <div class = "cell small-7 medium-8 large-8">
        <form onsubmit="return(createpet(<?php echo '\'' . $user . '\''?>, <?php echo $_SESSION['userid']?>))">
		    <label>Pet name:
                <input type="text" id="petname">
            </label>

            <label>Species
                <select id = "species" onchange = "updatecolorop()" autocomplete="off">
                    <option value="">--Choose species--</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="ferret">Ferret</option>
                    <option value="rabbit">Rabbit</option>
                    <option value="frog">Frog</option>
               </select>
            </label>

            <label>Color
                <select id ="color" onchange = "updatepetphoto()" autocomplete="off">
                </select>
            </label>

            <fieldset>
                <legend>Pet gender</legend>
                <input type="radio" name="gender" value="Male" id="male" required><label for="male">Male</label>
                <input type="radio" name="gender" value="Female" id="female"><label for="female">Female</label>
            </fieldset>

            <div class = "callout alert" id="message"></div>
            <button class = "submit button">Create pet</button>
	    </form>
    </div>
</div>
<?php
    send_footer();
?>