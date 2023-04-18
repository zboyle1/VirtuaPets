<?php 
function activepet() {
    $hunger = $_SESSION['hunger'];
    $joy = $_SESSION['joy'];

    echo<<<EOF
    <div class="card" style="width: 150px;" id="active">
    <script>
    showactive('$hunger', '$joy');
    </script>
    </div>
    EOF;
}