<?php

include_once ('ViewModel.php');
include_once ('../models/Exercise.php');
include_once ('../database/ExerciseDatabase.php');

class ExerciseViewModel extends ViewModel
{
    private ExerciseDatabase $database;

    /**
     * TaskViewModel constructor.
     */
    public function __construct()
    {
        $this->database = new ExerciseDatabase();
    }

    /**
     * Queries the database and returns the Exercise with the given ID
     *
     * @param integer $id The ID of the Exercise in the database
     * @return Exercise The queried Exercise
     */
    public function get_by_id(int $id): Exercise
    {
        $stmt = $this->database->query_by_id($id);
        $task_array = $this->fetchData($stmt);
        return $this->returnModel($task_array);
    }

    protected function fetchData(PDOStatement $stmt): array
    {
        $task_array = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $task = Exercise::from_pdo_statement($row);
            array_push($task_array, $task);
        }
        return $task_array;
    }

    /**
     * Returns only one Exercise from an array of Tasks.
     *
     * @param array $array An array with Tasks
     * @return Exercise Returns only one Exercise. If there are more or less than one element in the array the method
     * throws an exception
     */
    protected function returnModel(array $array): Exercise
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
