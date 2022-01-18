<?php


use JetBrains\PhpStorm\NoReturn;

// Defaults
const CONTROLLER_NAME = 'home';
const ACTION_NAME = 'index';

class Route
{
    private function __construct()
    {
    }

    static function run($controller_name = CONTROLLER_NAME, $action_name = ACTION_NAME)
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = explode('?', $routes[2])[0];
        }

        $model_name = 'model_' . $controller_name;
        $controller_name = $controller_name . 'Controller';
        $action = 'action_' . $action_name;

        $model_file = strtolower($model_name) . '.php';
        $model_path = "app/models/" . $model_file;

        $controller_file = $controller_name . '.php';
        $controller_path = "app/controllers/" . $controller_file;

        try {

                include_once $model_path;

            require_once $controller_path;

            $controller = new $controller_name();

            if (method_exists($controller, $action)) {
                Route::process_attributes($controller, $action);
                $controller->$action();
            } else {
                throw;
            }
        } catch (Exception) {
            Route::error_page_404();
        }
    }

    static function process_attributes($controller, $action)
    {
        $reflection_action = new ReflectionMethod($controller::class, $action);

        foreach ($reflection_action->getAttributes() as $attribute) {
            $attribute->newInstance();
        }
    }

    #[NoReturn] static function error_page_404()
    {
        http_response_code(404);
        exit;
    }
}