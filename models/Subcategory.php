<?php

include_once('Model.php');

class Subcategory implements Model
{
    private int $id;
    private string $description;

    /**
     * Subcategory constructor
     *
     * @param integer $id The ID of the Subcategory
     * @param string $description The description of the Subcategory
     */
    public function __construct(int $id, string $description)
    {
        $this->id = $id;
        $this->description = $description;
    }

    /**
     * Creates a Subcategory from a database query
     *
     * @param array $row The fetched query from the database
     * @return Subcategory The Subcategory returned from the database
     */
    public static function from_pdo_statement(array $row): Subcategory
    {
        return new Subcategory(
            $row['id'],
            $row['description'],
        );
    }

    /**
     * @return integer The Subcategory ID
     */
    public function get_id(): int
    {
        return $this->id;
    }

    /**
     * @return string The description of the Subcategory
     */
    public function get_description(): string
    {
        return $this->description;
    }
}
