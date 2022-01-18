<?php

namespace Models;
require_once "db.php";

use Model;
use R;

class Authentication extends Model
{
    public function get_data(): array
    {
        return array();
    }

    public function login($nickname, $password)
    {
        $user = R::findOne('users', 'nickname = ?', array($nickname));

        if ($user) {
            $password_valid = password_verify($password, $user["password"]);

            if ($password_valid) {
                $_SESSION["user"] = array("id" => $user["id"], "nickname" => $user["nickname"]);
            } else {
                http_response_code(406);
            }
        } else {
            http_response_code(404);
        }
    }

    public function signup($nickname, $password)
    {
        $user = R::dispense('users');

        $user["nickname"] = $nickname;
        $user["password"] = password_hash($password, PASSWORD_DEFAULT);

        $userExist = R::count('users', 'nickname = ?', array($nickname)) > 0;

        if ($userExist) {
            http_response_code(409);
        } else {
            try {
                R::store($user);
            } catch (\RedBeanPHP\RedException\SQL $e) {
                http_response_code(500);
            }
        }
    }
}
