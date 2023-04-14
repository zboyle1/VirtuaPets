<?php
    $page = "Create a pet";
	include '../header.php';
    include '../footer.php';
?>
<div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    <div class = "cell">
        <h3>Create a pet</h3>
    </div>
    <!-- image of chosen pet to the right -->
    <div class = "cell small-5 medium-4 large-4 align-self-middle">
        <img class = "thumbnail" src="/~zboyle1/assets/petimg/petplaceholder.png">
    </div>
    <!-- to the left: -->
    <div class = "cell small-7 medium-8 large-8">
        <form onsubmit="return(createpet())">
            <!-- text field for petname -->
		    <label>Pet name:
                <input type="text" id="user">
            </label>
            <!-- drop downs for species and color -->
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
                <select id ="color">
                </select>
            </label>
            <!-- radio buttons for gender -->
            <fieldset>
            <legend>Pet gender</legend>
                <input type="radio" name="gender" value="Male" id="male" required><label for="male">Male</label>
                <input type="radio" name="gender" value="Female" id="female"><label for="female">Female</label>
            </fieldset>
            <!-- submit button, calls ajax request to create new row in pet table -->
            <button class = "submit button">Create pet</button>
            <div id="message"></div>
	    </form>
    </div>
</div>
<?php
    send_footer();
?>