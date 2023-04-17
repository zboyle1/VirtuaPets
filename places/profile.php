<?php
    $page = "My pets";
	include '../header.php';
    include '../footer.php';
    $user = $_GET['user'];
?>
<div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    
    <div class = "cell large-4">
        <h2><?php echo $user ?>'s profile</h2>      
    </div>
    
    <div class = "cell large-8">
        <h2>Pets</h2>      
    </div>

    <div class = "cell large-4 align-self-middle" id = "userinfo">

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