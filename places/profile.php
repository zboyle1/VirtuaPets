<?php
    $page = "My pets";
	include '../header.php';
    include '../footer.php';
    $user = $_GET['user'];
?>
<!-- Okay, should change this so links to profile will use GET method to retrieve user's name but well save that for later-->
<div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    <div class = "callout alert" id="message"></div>
    
    <div class = "cell large-4">
        <h2><?php echo $user ?>'s profile</h2>      
    </div>
    
    <div class = "cell large-8">
        <h2>Pets</h2>      
    </div>


    <div class = "cell large-4 align-self-middle" id = "userinfo">

    </div>

    <div class = "cell large-8" id ="petinfo">
        <!-- send ajax request to get all pet details -->
        <!-- display pets in cards, side by side -->
        <!-- each pet card will display an image of the pet, the pets name and hunger level-->
    </div>
</div>

<script>
    user = "<?php echo $user ?>"
    id = "<?php echo $_SESSION['userid']?>";
    showuser(user);
    showpet(id);
</script>
<?php
    send_footer();
?>