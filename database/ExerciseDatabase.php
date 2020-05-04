<?php

include_once('Database.php');

class ExerciseDatabase extends Database
{
    /**
     * TaskDatabase constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tablename = "exercise";
    }
}
