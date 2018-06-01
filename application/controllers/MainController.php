<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $result = $this->getModel()->getArticles();
        $vars = [
            'articles' => $result,
        ];
        $this->getView()->render('Главная страница', $vars);
    }

}