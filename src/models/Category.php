<?php

include_once('Model.php');

class Category implements Model
{
    private int $id;
    private string $description;

    /**
     * Category constructor
     *
     * @param integer $id The ID of the Category
     * @param string $description The description of the Category
     */
    public function __construct(int $id, string $description)
    {
        $this->id = $id;
        $this->description = $description;
    }

    /**
     * Creates a Category from a database query
     *
     * @param array $row The fetched query from the database
     * @return Category The Category returned from the database
     */
    public static function from_pdo_statement(array $row): Category
    {
        return new Category(
            $row['id'],
            $row['description'],
        );
    }

    /**
     * @return integer The Category ID
     */
    public function get_id(): int
    {
        return $this->id;
    }

    /**
     * @return string The description of the Category
     */
    public function get_description(): string
    {
        return $this->description;
    }
}
