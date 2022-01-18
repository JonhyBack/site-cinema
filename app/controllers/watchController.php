<?php

use Models\Watch;

class WatchController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Watch();
    }

    #[HttpGet]
    function action_index()
    {
        $data = $this->model->get_data();

        if (isset($_GET['id']))
            $data['id'] = $_GET['id'];
        else
            Route::error_page_404();

        $this->view->render('view_watch.php', $data);
    }

    #[HttpPost]
    function action_rate()
    {
        $this->model->rate();
    }
}