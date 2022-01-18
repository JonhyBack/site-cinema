<?php

use Models\Admin;

class AdminController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Admin();
    }

    #[HttpGet]
    public function action_index()
    {
        if (isset($_GET['page'])) {
            $data = $this->model->get_data($_GET['page'], 10);
            $data['page'] = $_GET['page'];
        } else {
            $data = $this->model->get_data(1, 10);
            $data['page'] = 1;
        }

        $this->view->render('view_admin.php', $data);
    }

    #[HttpDelete]
    public function action_removeTitle()
    {
        $request_vars = array();
        parse_str(file_get_contents('php://input'), $request_vars);

        if (isset($request_vars['id'])) {
            $this->model->remove_title($request_vars['id']);
        } else {
            http_response_code(400);
        }
    }

    #[HttpPost]
    public function action_addTitle()
    {
        $check_array = array('kinopoisk_id', 'title', 'poster_url');

        if (!array_diff($check_array, array_keys($_POST))) {
            $this->model->add_title($_POST);
        } else {
            http_response_code(400);
        }
    }
}