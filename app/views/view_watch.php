<div class="embed-responsive embed-responsive-16by9">
    <?php
    echo '<div id="kinoplayertop" data-kinopoisk="' . $data['id'] . ' "></div>';
    ?>
</div>

<?php if (isset($_SESSION["user"])) include_once "layouts/view_template_stars.php"; else echo '<div class="d-flex justify-content-center">Login to rate.</div>' ?>

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn"
        crossorigin="anonymous"></script>
<script src="//kinoplayer.top/top.js"></script>

