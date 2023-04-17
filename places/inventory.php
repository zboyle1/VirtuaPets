<?php
    $page = "My inventory";
	include '../header.php';
    include '../footer.php';
?>
<div id = "content" class = "grid-x grid-padding-x grid-margin-x">
    <div class = "cell">
        <h3>Your items</h3>
    </div>

    <div class = "cell">
        <img src = "/~zboyle1/assets/petimg/petplaceholder.png">
        <p>Play with, or feed your pet</p>
    </div>

    <div class ="cell">
        <div class = "callout alert" id = "message">

        </div>
    </div>
</div>
    <script>
        showuserinv();
    </script>
<?php
    send_footer();
?>