<?php
    $page = "Shop";
	include '../header.php';
    include '../footer.php';
?>
    <div id = "content" class = "grid-x grid-padding-x grid-margin-x">
        <div class = "cell">
            <h3>Item shop</h3>
        </div>

        <div class = "cell align-self-center">
            <img src = "/~zboyle1/assets/petimg/petplaceholder.png">
            <p class="lead">Welcome to the shop!</p>
        </div>

        <div class ="cell">
            <div class = "callout alert" id = "message"></div>
        </div>
    </div>

<script>
    showitems();
</script>
<?php
    send_footer();
?>