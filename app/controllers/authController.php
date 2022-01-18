<?php


use Models\Authentication;

include_once "app/models/db.php";


class AuthController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Authentication();
    }

    #[HttpPost]
    function action_index()
    {
    }

    #[HttpPost]
    function action_login()
    {
        $check_array = array('nickname', 'password');

        if (!array_diff($check_array, array_keys($_POST))) {
            $nickname = $_POST["nickname"];
            $password = $_POST["password"];

            $this->model->login($nickname, $password);
        }
    }

    #[HttpPost]
    function action_signup()
    {
        $check_array = array('nickname', 'password');

        if (!array_diff($check_array, array_keys($_POST))) {
            $nickname = $_POST["nickname"];
            $password = $_POST["password"];

            $this->model->signup($nickname, $password);
        }
    }

    #[HttpPost]
    function action_logout()
    {
        unset($_SESSION["user"]);
    }

}