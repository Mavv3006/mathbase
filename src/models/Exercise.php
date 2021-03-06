<?php

require_once('Model.php');

class Exercise implements Model
{
    private int $id;
    private int $user_id;
    private string $description;
    private string $solution;
    private string $created_at;
    private string $updated_at;
    private string $title;
    private int $category;
    private int $subcategory;
    private int $difficulty;

    /**
     * Exersise constructor
     *
     * @param integer $id The ID of the Exersise
     * @param integer $user_id The ID of the user who created the Exersise
     * @param string $description The description of the Exersise
     * @param string $solution The solution of the Exersise
     * @param string $created_at The date and time the Exersise was created at
     * @param string $updated_at The date and time the Exersise was last updated
     */
    public function __construct(int $id, int $user_id, string $title, string $description, string $solution, string $created_at, string $updated_at, int $category, int $subcategory, int $difficulty, string $picture)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->description = $description;
        $this->solution = $solution;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->title = $title;
        $this->subcategory = $subcategory;
        $this->category = $category;
        $this->difficulty = $difficulty;
        $this->picture = $picture;
    }

    /**
     * Creates a Task from a database query.
     *
     * @param array $row The fetched query from the database
     * @return Exercise The Exercise returned from the database query
     */
    public static function from_pdo_statement(array $row): Exercise
    {
        return new Exercise(
            $row['id'],
            $row['user_id'],
            $row['title'],
            $row['description'],
            $row['solution'],
            $row['created_at'],
            $row['updated_at'],
            $row['category'],
            $row['subcategory'],
            $row['difficulty'],
            $row['picture'],
        );
    }

    /**
     * Returns an Exercise into an array.
     *
     * @return array The array representation of the exercise
     */
    public function toArray():array
    {
        return array(
            "user_id" => $this->get_user_id(),
            "description" => $this->get_description(),
            "solution" => $this->get_solution(),
            "title" => $this->get_title(),
            "category" => $this->get_category(),
            "subcategory" => $this->get_subcategory(),
            "difficulty" => $this->get_difficulty()
        );
    }

    /**
     * @return integer The Tasks ID
     */
    public function get_id(): int
    {
        return $this->id;
    }

    /**
     * @return integer The ID of the User who created the Exersise
     */
    public function get_user_id(): int
    {
        return $this->user_id;
    }

    /**
     * @return string The description of the Exersise
     */
    public function get_description(): string
    {
        return $this->description;
    }

    /**
     * @return string The solution of the Exersise
     */
    public function get_solution(): string
    {
        return $this->solution;
    }

    /**
     * @return DateTime The date and time the task was created
     */
    public function get_created_at(): DateTime
    {
        return new DateTime($this->created_at);
    }

    /**
     * @return DateTime The date and time the task was last updated
     */
    public function get_updated_at(): DateTime
    {
        return new DateTime($this->updated_at);
    }

    /**
     * @return string The title of the exercise
     */
    public function get_title(): string
    {
        return $this->title;
    }


    /**
     * @return string The category of the exercise
     */
    public function get_category(): int
    {
        return $this->category;
    }


    /**
     * @return string The subcategory of the exercise
     */
    public function get_subcategory(): int
    {
        return $this->subcategory;
    }


    /**
     * @return string The title of the exercise
     */
    public function get_difficulty(): int
    {
        return $this->difficulty;
    }


    /**
     * @return string The path to the picture of the exercise
     */
    public function get_picture(): string
    {
        return $this->picture;
    }
}
