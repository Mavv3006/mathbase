<?php

abstract class Database
{
    protected PDO $connection;
    public string $tablename;

    private string $hostname;
    private string $password;
    private string $username;
    private string $dbName;


    /**
     * Database constructor.
     */
    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
        $configs = get_config_array();
        $this->hostname = $configs['host'];
        $this->password = $configs['password'];
        $this->username = $configs['username'];
        $this->dbName = $configs['dbName'];

        $this->connection = $this->connect();
    }


    /**
     * Queries the database for every entry in the table.
     *
     * @return PDOStatement The Statement returned from querying the database
     */
    public function query_all(): PDOStatement
    {
        $query = "
            SELECT *
            FROM
                " . $this->tablename . " t
            ORDER BY
                t.id;
        ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function query_by_id(int $id): PDOStatement
    {
        $query = "
            SELECT *
            FROM " . $this->tablename . " t
            WHERE t.id = :id;
        ";

        // return $this->prepareStatement($query, $id);

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt;
    }

    public function create(array &$values): void
    {
        $this->prepareStatement(
            "INSERT INTO " . $this->tablename . " (user_id, description, solution, title, category, subcategory, difficulty, picture) 
            VALUES (?,?,?,?,?,?,?,?)",
            $values
        );
    }
    public function update(string $query, array &$values): void
    {
        $this->prepareStatement($query, $values);
    }

    /**
     * Prepares and executes an SQL query. If provided it also binds parameters.
     *
     * @param string $query The SQL query to execute
     * @param mixed ...$parameters An array with the parameters to bind
     * @return PDOStatement The Statement retuned from querying the database
     */
    protected function prepareStatement(string $query, array &$parameters): PDOStatement
    {
        $stmt = $this->connection->prepare($query);

        for ($i = 0; $i < count($parameters); $i++) {
            $stmt->bindParam($i + 1, $parameters[$i]);
        }

        $stmt->execute();
        return $stmt;
    }

    /**
     * Undocumented function
     *
     * @return PDO An active connection
     */
    private function connect(): PDO
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->dbName . ";charset=utf8", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        return $this->connection;
    }
}
