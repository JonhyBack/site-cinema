<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vinland Saga</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.9/plyr.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css	">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/star.css">
    <style>
        .prev-next {
            display: flex;
            justify-content: space-between;
        }

        .plyr {
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>

<?php require __DIR__ . "/../nav.php" ?>

<main>
    <div class="container" style="max-width: 50%;">
        <div class="embed-responsive embed-responsive-16by9">
            <video id="js-media-player" class="embed-responsive-item" preload="none" playsinline controls
                   poster="https://gen.jut.su/uploads/preview/269/0/0/1_1562657226.jpg">
                <source src="https://r150201.kujo-jotaro.com/vinland-saga/1.1080.f595493806356099.mp4?hash1=cf1ff8b4fba3cf4d488b466b06fe31be&amp;hash2=2418139503e967387753eec6f2e4b4d2"
                        type="video/mp4" lang="ru" size="1080">
                <source src="https://r150201.kujo-jotaro.com/vinland-saga/1.720.fa16763cec5144a8.mp4?hash1=0edb886de11098886d96d127133ab679&amp;hash2=8fdc5b957840076e74ab7c7aa5315c55"
                        type="video/mp4" lang="ru" size="720">
                <source src="https://r150201.kujo-jotaro.com/vinland-saga/1.480.98e2861ff2edf065.mp4?hash1=30e4a570f132c6f6ffba20e29e5a405c&amp;hash2=81ee7d0d9c8325d8a4e30fd28684eb84"
                        type="video/mp4" lang="ru" size="480">
                <source src="https://r150201.kujo-jotaro.com/vinland-saga/1.360.ebd94cc457f2a7cc.mp4?hash1=3d001d2d462a706fe2785a78cd79c2fb&amp;hash2=e69fb73cb8e7a6d578c642177c0ae51f"
                        type="video/mp4" lang="ru" size="360">
            </video>
        </div>

        <?php require "star.php" ?>

        <div class="prev-next">
            <button type="button" class="btn btn-primary">Previous Episode</button>
            <button type="button" class="btn btn-warning">Next Episode</button>
        </div>

    </div>
</main>

<?php require __DIR__ . "/../footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
<script src="https://cdn.plyr.io/3.6.9/plyr.js"></script>
<script src="../assets/js/watch.js"></script>
</body>
</html>


