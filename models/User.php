<?php

class User implements Model
{
    private $id;
    private $username;
    private $email;

    /**
     * User constructor.
     *
     * @param integer $id The Users ID
     * @param string $username The Users username
     * @param string $email The Users email
     */
    public function __construct(int $id, string $username, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    /**
     * Creates an User from a database query.
     * 
     * @param PDOStatement $stmt The PDOStatement returned from the database query
     * @return User The User corresponding to the PDOStatement
     */
    public static function from_pdo_statement(PDOStatement $stmt): User
    {
        if ($stmt->rowCount > 1) throw new Exception("Too many users have the same username", 1);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return new User(
            $row['id'],
            $row['username'],
            $row['email'],
        );
    }

    /**
     * @return integer The Users ID
     */
    public function get_id(): int
    {
        return $this->id;
    }

    /**
     * @return string The Users username
     */
    public function get_username(): string
    {
        return $this->username;
    }


    /**
     * @return string The Users email
     */
    public function get_email(): string
    {
        return $this->email;
    }
}
