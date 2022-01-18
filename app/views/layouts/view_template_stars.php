<link rel="stylesheet" href="../../../css/stars.css">

<div class="d-flex justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <div class="stars">
                <form id="rateForm" onclick="rate()" ?>
                    <?php
                    for ($i = 5; $i > 0; $i--) {
                        if ($i == $data['star']) {
                            echo '<input class="star star-' . $i . '" id="star-' . $i . '" value="' . $i . '"
                               type="radio" checked name="star"/> <label
                                class="star star-' . $i . '" for="star-' . $i . '"></label>';
                        } else {
                            echo '<input class="star star-' . $i . '" id="star-' . $i . '" value="' . $i . '"
                               type="radio" name="star"/> <label
                                class="star star-' . $i . '" for="star-' . $i . '"></label>';
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

<script>
    let xhr = null;

    function rate() {
        if (xhr) {
            xhr.abort();
        }

        const data = $('#rateForm').serializeArray();

        xhr = $.ajax({
            url: '<?php echo '//' . $_SERVER['HTTP_HOST'] . '/watch/rate' ?>',
            data: data,
            method: "POST"
        });
    }
</script>