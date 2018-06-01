<?php


namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getArticles()
    {
        $result = $this->getDb()->row('SELECT title, descriptions FROM articles');
        return $result;
    }
}