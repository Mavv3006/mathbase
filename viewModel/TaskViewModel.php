<?php

class TaskViewModel extends ViewModel
{
    private TaskDatabase $database;

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
        $task_array = $this->fetchData($stmt);

    }

    protected function fetchData(PDOStatement $stmt): array
    {
        $task_array = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $task = Task::from_pdo_statement($row);
            array_push($task_array, $task);
        }
        return $task_array;
    }

    /**
     * Returns only one Task from an array of Tasks.
     *
     * @param array $array An array with Tasks
     * @return Task Returns only one Task. If there are more or less than one element in the array the method
     * throws an exception
     */
    protected function returnModel(array $array): Task
    {
        $count = count($array);

        if ($count == 0) {
            // TODO: throw NoDatabaseEntryFoundException
        } else if ($count == 1) {
            return $array[0];
        } else {
            // TODO: throw DatabaseException
        }
    }
}
