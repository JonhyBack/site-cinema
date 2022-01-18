<?php
namespace Models;
require_once "db.php";

use Model;
use R;

class Admin extends Model
{
    public function get_data($page = 1, $limit = 5): array
    {
        $titles_beans = R::findAll('titles', 'LIMIT ' . (($page - 1) * $limit) . ', ' . $limit);
        $data['titles'] = R::exportAll($titles_beans);

        $total_titles = R::count('titles');
        $total_pages = ceil($total_titles / $limit);
        $data['total_pages'] = $total_pages;

        return $data;
    }

    public function remove_title($id)
    {
        $title = R::findOne('titles', 'id = ?', [$id]);
        $kinopoisk_id = $title["kinopoisk_id"];

        $ratings = R::find('ratings', 'kinopoisk_id = ?', [$kinopoisk_id]);

        R::trashBatch('titles', [$id]);
        R::trashAll($ratings);
    }

    public function add_title($data)
    {
        $title = R::dispense( 'titles' );

        $title['kinopoisk_id'] = $data['kinopoisk_id'];
        $title['title'] = $data['title'];
        $title['poster_url'] = $data['poster_url'];

        R::store($title);
    }
}