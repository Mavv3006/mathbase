<?php
abstract class Database
{
    private $connection;
    private $tablename;

    private $hostname = "localhost";
    private $password = "root";
    private $username = "";
    private $dbName = "mathbase";

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    /**
     * Undocumented function
     *
     * @return PDO An active connection
     */
    protected function connect(): PDO
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->dbName . ";charset=utf8", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        try {
            $query = "SET lc_time_names = 'de_DE'";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            printf($e->getMessage());
        }
        return $this->connection;
    }
}
