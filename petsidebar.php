<?php 
function activepet() {
    echo<<<EOF
    <div class="card" style="width: 150px;" id="active">
    <script>
    showactive();
    </script>
    </div>
    EOF;
}