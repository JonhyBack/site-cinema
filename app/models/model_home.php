<?php

namespace Models;

require_once "db.php";

use Model;
use R;

class Home extends Model
{
    public function get_data($page = 1, $limit = 5): array
    {
        $titles_beans = R::findAll('titles', 'ORDER BY title LIMIT ' . (($page - 1) * $limit) . ', ' . $limit);
        $data['titles'] = R::exportAll($titles_beans);

        $total_titles = R::count('titles');
        $total_pages = ceil($total_titles / $limit);
        $data['total_pages'] = $total_pages;

        return $data;
    }
}