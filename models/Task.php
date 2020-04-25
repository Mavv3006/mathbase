<?php

class Task implements Model
{
    private int $id;
    private int $user_id;
    private string $description;
    private string $solution;
    private string $created_at;
    private string $updated_at;

    /**
     * Task constructor
     *
     * @param integer $id The ID of the Task
     * @param integer $user_id The ID of the user who created the Task
     * @param string $description The description of the Task
     * @param string $solution The solution of the Task
     * @param string $created_at The date and time the Task was created at
     * @param string $updated_at The date and time the Task was last updated
     */
    public function __construct(int $id, int $user_id, string $description, string $solution, string $created_at, string $updated_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->description = $description;
        $this->solution = $solution;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * Creates an array of Tasks from a database query.
     *
     * @param PDOStatement $stmt The PDOStatement returned from the database query
     * @return array An array of tasks
     */
    public static function from_pdo_statement(PDOStatement $stmt): array
    {
        $taskArray = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $task = new Task(
                $row['id'],
                $row['user_id'],
                $row['description'],
                $row['solution'],
                $row['created_at'],
                $row['updated_at'],
            );
            array_push($taskArray, $task);
        }
        return $taskArray;
    }

    /**
     * @return integer The Tasks ID
     */
    public function get_id(): int
    {
        return $this->id;
    }

    /**
     * @return integer The ID of the User who created the Task
     */
    public function get_user_id(): int
    {
        return $this->user_id;
    }

    /**
     * @return string The description of the Task
     */
    public function get_description(): string
    {
        return $this->description;
    }

    /**
     * @return string The solution of the Task
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
}
