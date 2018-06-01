<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
//    public function before()
//    {
//        $this->getView()->setLayout('custom');
//    }

    public function loginAction()
    {
        //$this->getView()->redirect('/');
        if (!empty($_POST)) {
            //$this->getView()->location('/account/register');
            $this->getView()->message('error', 'текст ошибки');
        }
        $this->getView()->render('Вход');
    }

    public function registerAction()
    {
        $this->getView()->render('Регистрация');
    }

}