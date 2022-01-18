<?php

namespace Models;

require_once "db.php";

use JetBrains\PhpStorm\ArrayShape;
use Model;
use R;

class Watch extends Model
{
    #[ArrayShape(['star' => "integer"])] public function get_data(): array
    {
        $star = 0;

        if (isset($_SESSION["user"]["id"]) and isset($_GET["id"])) {
            $rating = R::findOne('ratings', 'user_id = ? AND kinopoisk_id = ?',
                array($_SESSION["user"]["id"], $_GET["id"]));


            if ($rating) {
                $star = $rating["star"];
            }
        }

        return array('star' => $star);
    }

    public function rate()
    {
        $check_array = array('star', 'user_id', 'kinopoisk_id');

        if (!array_diff($check_array, array_keys($_POST))) {
            try {
                $this->add_rating();
                $this->change_title_rating();
            } catch (\Exception $e) {
                http_response_code(500);
            }
        }
    }

    function validate_rating($rating): int
    {
        if ((0 <= $rating) && ($rating <= 5)) return $rating;
        elseif (0 > $rating) return 0;
        else return 5;
    }

    function add_rating()
    {
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

    function change_title_rating()
    {
        $ratings_by_kinopoisk_id = R::find('ratings', 'kinopoisk_id = ?',
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

        $title["rating"] = $this->validate_rating(floor($average_rating));
        R::store($title);
    }
}