<?php
require_once '../db.php';
?>

<div class="d-flex justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <div class="stars">
                <form id="rateFrom" onclick="rate(event)" ?>

                    <?php
                    if (isset($_SESSION["user"]["id"]) and isset($_GET["id"])) {
                        $rating = R::findOne('ratings', 'user_id = ? AND kinopoisk_id = ?',
                            array($_SESSION["user"]["id"], $_GET["id"]));

                        if ($rating) {
                            $star = $rating["star"];
                        } else {
                            $star = 0;
                        }

                        for ($i = 5; $i > 0; $i--) {
                            if ($i == $star) {
                                echo '<input class="star star-' . $i . '" id="star-' . $i . '" value="' . $i . '"
                               type="radio" checked name="star"/> <label
                                class="star star-' . $i . '" for="star-' . $i . '"></label>';
                            } else {
                                echo '<input class="star star-' . $i . '" id="star-' . $i . '" value="' . $i . '"
                               type="radio" name="star"/> <label
                                class="star star-' . $i . '" for="star-' . $i . '"></label>';
                            }
                        }
                    }
                    ?>
                    <input type="hidden" name="user_id"
                           value="<?php if (isset($_SESSION["user"])) echo $_SESSION["user"]["id"] ?>">
                    <input type="hidden" name="kinopoisk_id" value="<?php if (isset($_GET["id"])) echo $_GET["id"] ?>">
                </form>
            </div>
        </div>
    </div>
</div>
