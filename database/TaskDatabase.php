<?php

class TaskDatabase extends Database
{
    /**
     * TaskDatabase constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tablename = "tasks";
    }

    /**
     * Queries the database for all tasks.
     *
     * @return PDOStatement The corresponding PDOStatement
     */
    public function query_all_tasks(): PDOStatement
    {
        $query = "
            SELECT *
            FROM 
                " . $this->tablename . " t 
            ORDER BY 
                t.id ASC;
        ";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}
