<?php

namespace core;

abstract class Controller
{
    protected $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function notFound()
    {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
    }

    abstract protected function render($str);
}
