<?php

use Models\Home;

class HomeController extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Home();
    }

    #[HttpGet]
    function action_index()
    {
        if (isset($_GET['page'])) {
            $data = $this->model->get_data($_GET['page']);
            $data['page'] = $_GET['page'];
        } else {
            $data = $this->model->get_data();
            $data['page'] = 1;
        }

        $this->view->render('view_home.php', $data);
    }
}