<?php
	include '../header.php';
    include '../footer.php';
?>
<div class="cell medium-10 large-10">
    <div class="grid-x grid-padding-x" id="shop">
        <div class="cell" id="pagetitle">
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
</div>

<script>
    showitems();
</script>
<?php
    send_footer();
?>