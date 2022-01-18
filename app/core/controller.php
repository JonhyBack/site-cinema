<?php

abstract class Controller
{
    public Model $model;
    public View $view;

    function __construct()
    {
        $this->view = new View();
    }

    abstract public function action_index();
}