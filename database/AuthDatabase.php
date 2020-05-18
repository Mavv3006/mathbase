<?php

require_once('Database.php');

class AuthDatabase extends Database
{
    /**
     * AuthDatabase constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Returns an active database connection.
     *
     * @return PDO The database connection
     */
    public function get_db(): PDO
    {
        return $this->connection;
    }
}
