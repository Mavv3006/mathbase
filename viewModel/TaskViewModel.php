<?php

class TaskViewModel extends ViewModel
{


    /**
     * TaskViewModel constructor.
     */
    public function __construct()
    {
        $this->database = new TaskDatabase();
    }

    /**
     * Queries the database and returns the Task with the given ID
     *
     * @param integer $id The ID of the Task in the database
     * @return Task The queried Task
     */
    public function get_by_id(int $id): Task
    {
        $stmt = $this->database->query_by_id($id);
        $task_array = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $task = Task::from_pdo_statement($row);
            array_push($task_array, $task);
        }

        if (count($task_array) == 1) {
            return $task_array[0];
        } else {
            // throw  irgendeinen Error;
        }
    }
}
