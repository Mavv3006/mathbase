<?php

class UserDatabase extends Database
{
    /**
     * UserDatabase constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tablename = "users";
    }

    /**
     * Queries an User from the username.
     *
     * @param string $username The Users username
     * @return PDOStatement The corresponding PDOStatement
     */
    public function query_user(string $username): PDOStatement
    {
        $query = "
            SELECT 
                id,
                username,
                email
            FROM
                " . $this->tablename . "
            WHERE
                username = ?;
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $username);

        $stmt->execute();

        return $stmt;
    }
}
