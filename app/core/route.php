<?php


use JetBrains\PhpStorm\NoReturn;

// Defaults
const CONTROLLER_NAME = 'Home';
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
        $model_path = "/../models/" . $model_file;
        if (file_exists($model_path)) {
            include_once $model_path;
        }

        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = __DIR__ . "/../controllers/" . $controller_file;
        echo $controller_path;
        if (file_exists($controller_path)) {
            include_once $controller_path;
        } else {
            // Route::error_page_404();
        }
        echo class_exists($controller_name) ? 'true' : 'false';
        $controller = new $controller_name();

        if (method_exists($controller, $action)) {
            Route::process_attributes($controller, $action);
            $controller->$action();
        } else {
            // Route::error_page_404();
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