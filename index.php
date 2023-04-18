<?php
	include 'header.php';
    include 'footer.php';
?>
<div class="cell small-10 medium-10 large-10">
    <div class="grid-x grid-padding-x shrink">
        <div class="cell" id="pagetitle">
            <h3>Welcome <?php echo !$_SESSION['user'] ? "guest" : $_SESSION['user']; ?>!</h3>
        </div>

        <div class="cell">
            <h4 class="subheader">Adopt and take care of a virtual pet</h4>
        </div>

        <div class="cell large-8 medium-10">
            <p style="margin-left: 1em;">
                Here, you can create your very own virtual pets! You can choose their name, species and color. Buy items to play with and feed your pet!
            </p>
        </div>

        <div class="cell large-2 medium-2">
            <img src="/~zboyle1/assets/petimg/frog/Green.png">
        </div>

        <div class="cell">
            <h4 class="subheader">Explore and earn gold</h4>
        </div>

        <div class="cell large-2 medium-2">
            <img src="/~zboyle1/assets/petimg/cat/Orange.png">
        </div>

        <div class="cell large-8 medium-10">
            <p class="text-right">
            Explore the various pages, theres a chance of gold appearing on the page! Click it to add the gold to your account. You can use this to buy food or items for your pet.
            </p>
        </div>
    </div>
</div>

<?php
    send_footer();
?>