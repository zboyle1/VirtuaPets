<?php
    $page = "My pets";
	include '../header.php';
    include '../footer.php';
    $user = $_GET['user'];
?>
<div class="cell medium-10 large-10">
    <div class="grid-x grid-padding-x" id= "pets">
        <div class="cell large-4" id="pagetitle">
            <h2><?php echo $user ?>'s profile</h2>      
        </div>
    
        <div class = "cell large-8" id="pagetitle">
            <h2>Pets</h2>      
        </div>

        <div class = "cell large-4 align-self-middle" id = "userinfo">

        </div>
    </div>
</div>

<script>
    user = "<?php echo $user ?>"

    showuser(user);
    showpet(user);
</script>
<?php
    send_footer();
?>