<?php
	include '../header.php';
    include '../footer.php';
?>
<div class="cell medium-10 large-10">
    <div class="grid-x grid-padding-x" id="inv">
        <div class="cell" id="pagetitle">
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
</div>

<script>
    showuserinv();
</script>
<?php
    send_footer();
?>