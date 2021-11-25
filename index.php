<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anime site</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .checked {
            color: orange;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
            color: inherit;
        }

        .scale {
            transition: .5s;
        }

        .scale:hover {
            transform: scale(1.05);
        }

        h1 {
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .card {
            background-color: rgba(255, 255, 255, .3);
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>

<?php require "nav.php" ?>

<main>
    <div class="container">
        <h1>List of titles</h1>

        <?php
        require_once "db.php";
        $col = 4;

        $titles_beans = R::findAll('titles');
        $titles = R::exportAll($titles_beans);

        for ($c = 0; $c < count($titles); $c += $col) {
            echo '<div class="row mb-4">';

            for ($i = $c; $i < $c + $col and $i < count($titles); $i++) {
                echo '<div class="col-3">
                        <div class="card">
                            <a class="card-body scale" href="watch/index.php?id=' . $titles[$i]["kinopoisk_id"] . '">
                                <img src="' . $titles[$i]["poster_url"] . '" class="img-thumbnail" alt="' . $titles[$i]["title"] . '_img">
                                <h5 class="card-title">' . $titles[$i]["title"] . '</h5>';
                echo '<p>Rated: ';

                for ($j = 1; $j <= 5; $j++) {
                    if ($j <= $titles[$i]["rating"]) {
                        echo '<span class="fa fa-star checked"></span>';
                    } else {
                        echo '<span class="fa fa-star"></span>';
                    }
                }

                echo '</p>';
                echo '</a>
                    </div>
                </div>
                ';
            }

            echo '</div>';
        }
        ?>
    </div>
</main>

<?php require "footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

<script src="/assets/js/index.js"></script>

</body>
</html>
