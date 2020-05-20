<?php

include_once('Model.php');

class Difficulty implements Model
{
    private int $id;
    private string $description;

    /**
     * Difficulty constructor
     *
     * @param integer $id The ID of the Difficulty
     * @param string $description The description of the Difficulty
     */
    public function __construct(int $id, string $description)
    {
        $this->id = $id;
        $this->description = $description;
    }

    /**
     * Creates a Difficulty from a database query
     *
     * @param array $row The fetched query from the database
     * @return Difficulty The Difficulty returned from the database
     */
    public static function from_pdo_statement(array $row): Difficulty
    {
        return new Difficulty(
            $row['id'],
            $row['description'],
        );
    }

    /**
     * @return integer The Difficulty ID
     */
    public function get_id(): int
    {
        return $this->id;
    }

    /**
     * @return string The description of the Difficulty
     */
    public function get_description(): string
    {
        return $this->description;
    }
}
