<?php

require_once('Model.php');
class User implements Model
{
    private int $id;
    private string $username;
    private string $email;
    private string $picture;

    /**
     * User constructor.
     *
     * @param integer $id The Users ID
     * @param string $username The Users username
     * @param string $email The Users email
     */
    public function __construct(int $id, string $username, string $email, string $picture)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->picture = $picture;
    }

    /**
     * Creates an User from a database query.
     *
     * @param array $stmt The array returned from the database query
     * @return User The User corresponding to the PDOStatement
     */
    public static function from_pdo_statement(array $row): User
    {
        return new User(
            $row['id'],
            $row['username'],
            $row['email'],
            $row['picture']
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


    /**
     * @return string The path to the Users picture
     */
    public function get_picture(): string
    {
        return $this->picture;
    }
}
