<?php

const TEMPLATE_VIEW = 'view_html.php';
class View
{
    function render($content_view, $data = null)
    {
        include_once 'app/views/' . TEMPLATE_VIEW;
    }
}