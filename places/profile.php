<?php
    $page = "My pets";
	include '../header.php';
    include '../footer.php';
?>
    <div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    <div class = "cell">
<!-- Okay, should change this so links to profile will use GET method to retrieve user's name -->
            <h2><?php echo "$user's profile" ?></h2>      
            <!-- send ajax request to get user details -->
            <!-- show username, age, and join date -->
            <!-- send ajax request to get all pet details -->
            <!-- display pets in cards, side by side -->
            <!-- each pet card will display an image of the pet, the pets name and hunger level-->
</div>
</div>
<?php
    send_footer();
?>