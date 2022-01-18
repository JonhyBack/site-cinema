<?php

class AboutController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    #[HttpGet]
    function action_index()
    {
        $this->view->render('view_about.php');
    }
}