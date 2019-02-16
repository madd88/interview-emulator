<?php

/**
 * Построение маршрута
 */

namespace core\classes;

class Router
{
    public static function start()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $actionName = ($uri[2]) ? $uri[2] : 'index';
        $controllerName = ($uri[1]) ? 'core\\' . ucfirst($uri[1]) . 'Controller' : 'core\BaseController';

        $actionName = $actionName;
        $controller = new $controllerName();

        if (method_exists($controller, $actionName))
            $controller->$actionName();
        else
            $controller->action404();
    }
}
