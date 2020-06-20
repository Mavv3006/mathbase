<?php

require_once('Model.php');

class Subcategory implements Model
{
    private int $id;
    private string $description;
    private int $category;

    /**
     * Subcategory constructor
     *
     * @param integer $id The ID of the Subcategory
     * @param string $description The description of the Subcategory
     * @param integer $category The ID of the related Category
     */
    public function __construct(int $id, string $description, int $category)
    {
        $this->id = $id;
        $this->description = $description;
        $this->category = $category;
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
            $row['category']
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

    /**
     * @return integer The Category ID
     */
    public function get_icategory(): int
    {
        return $this->category;
    }
}
