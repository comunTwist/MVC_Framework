<?php

namespace application\core;

use application\lib\Db;

abstract class Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function getDb()
    {
        return $this->db;
    }
}