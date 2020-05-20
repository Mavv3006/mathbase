<?php

include_once('Database.php');

class SubcategoryDatabase extends Database
{
    /**
     * SubcategoryDatabase constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tablename = "subcategories";
    }
}
