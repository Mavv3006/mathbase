<?php

require_once('Database.php');

class CategoryDatabase extends Database
{
    /**
     * CategoryDatabase constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tablename = "categories";
    }
}
