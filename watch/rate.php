<?php
require_once '../db.php';

function validate_rating($rating) {
    if ((0 <= $rating) && ($rating <= 5)) return $rating;
    elseif ((0 > $rating)) return 0;
    elseif ((5 < $rating)) return 5;
}

function add_rating() {
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

function change_title_rating() {
    $ratings_by_kinopoisk_id =  R::find('ratings', 'kinopoisk_id = ?',
        array($_POST['kinopoisk_id']));
    if (!isset($ratings_by_kinopoisk_id)) die();

    $average_rating = 0;

    foreach ($ratings_by_kinopoisk_id as $rating) {
        $average_rating += $rating->star;
    }

    $average_rating = $average_rating / count($ratings_by_kinopoisk_id);

    $title = R::findOne('titles', 'kinopoisk_id = ?',
        array($_POST['kinopoisk_id']));
    if (!isset($title)) die();

    $title["rating"] = validate_rating(floor($average_rating));
    R::store($title);
}

$check_array = array('star', 'user_id', 'kinopoisk_id');

if (!array_diff($check_array, array_keys($_POST))) {
    add_rating();
    change_title_rating();
}
