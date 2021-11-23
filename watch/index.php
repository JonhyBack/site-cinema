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
            <?php
            error_reporting(E_ERROR | E_PARSE);

            $html = file_get_contents('https://jut.su/vinland-saga/episode-1.html');
            $dom = new DOMDocument;
            $dom->loadHTML($html);
            $xpath = new DOMXPath($dom);

            $video = $xpath->query('//video');

            if ($video->length == 1) {
                $poster = $xpath->query('//video/@poster');
                $sources = $xpath->query('//video/source');

                if ($poster->length > 0 and $sources->length > 0) {
                    echo '<video id="js-media-player" class="embed-responsive-item"
                     preload="none" playsinline control 
                     poster="' . $poster->item(0)->nodeValue . '">';

                    for($i=0; $i<$sources->length; $i++)
                    {
                        echo '<source src="'. $sources->item($i)->attributes['src']->nodeValue .'"
                                    type="video/mp4" lang="ru" 
                                    size="'. $sources->item($i)->attributes->item(4)->nodeValue .'">';
                    }

                    echo '</video>';
                }
            } else {
                echo 'Something went wrong';
            }

            ?>

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


