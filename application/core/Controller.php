<?php

namespace application\core;

abstract class Controller
{
    private $route;
    private $view;
    private $model;
    private $acl;

    public function __construct($route)
    {
        $this->route = $route;
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getView()
    {
        return $this->view;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getAcl()
    {
        return $this->acl;
    }

    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl()
    {
        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php';
        if ($this->isAcl('all')) {
            return true;
        } else if (isset($_SESSION['authorize']['id']) && $this->isAcl('authorize')) {
            return true;
        } else if (!isset($_SESSION['authorize']['id']) && $this->isAcl('guest')) {
            return true;
        } else if (isset($_SESSION['admin']['id']) && $this->isAcl('admin')) {
            return true;
        }
        return false;
    }

    public function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }
}