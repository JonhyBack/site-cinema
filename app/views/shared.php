<?php

function echo_pagination($total_pages, $page, $func_numerating, $max_visible_pages = 5)
{
    $i = 1;
    $end_page = $total_pages;

    if ($total_pages > $max_visible_pages) {
        $range_pages = floor($max_visible_pages / 2);

        $start_page = $page - $range_pages;
        $end_page = $page + $range_pages;

        if ($end_page > $total_pages) {
            $end_page = $total_pages;
            $i = $start_page - ($end_page - $total_pages);
        } elseif ($start_page > 1) {
            $i = $start_page;
        }
    }

    for (; $i <= $end_page; $i++) {
        if (is_callable($func_numerating)) {
            $func_numerating($i);
        }
    }
}
