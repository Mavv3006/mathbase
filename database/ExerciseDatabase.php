<?php

require_once('Database.php');

class ExerciseDatabase extends Database
{
    /**
     * ExerciseDatabase constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tablename = "exercise";
    }
}
