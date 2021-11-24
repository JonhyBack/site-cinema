<?php
require '../db.php';

$check_array = array('star', 'user_id', 'kinopoisk_id');

if (!array_diff($check_array, array_keys($_POST))) {
    $rating = R::dispense('ratings');

    $existing_rating = R::findOne('ratings', 'user_id = ? AND kinopoisk_id = ?',
        array($_POST["user_id"], $_POST['kinopoisk_id']));

    if ($existing_rating) {
        $existing_rating["star"] = $_POST['star'];

        R::store($existing_rating);
    } else {
        $rating["star"] = $_POST['star'];
        $rating["user_id"] = $_POST['user_id'];
        $rating["kinopoisk_id"] = $_POST['kinopoisk_id'];

        R::store($rating);
    }
}
