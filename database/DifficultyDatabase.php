<?php

require_once('Database.php');

class DifficultyDatabase extends Database
{
    /**
     * DifficultyDatabase constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tablename = "difficulties";
    }
}
