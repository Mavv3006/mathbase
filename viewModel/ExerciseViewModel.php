<?php

require_once('ViewModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/Exercise.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/ExerciseDatabase.php');

class ExerciseViewModel extends ViewModel
{
    private ExerciseDatabase $database;

    /**
     * ExerciseViewModel constructor.
     */
    public function __construct()
    {
        $this->database = new ExerciseDatabase();
    }

    /**
     * Queries the database and returns the Exercise with the given ID.
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

    /**
     * Queries the database and returns all the Exercises.
     *
     * @return array An Array of Exercises
     */
    public function get_all(): array
    {
        $stmt = $this->database->query_all();
        return $this->fetchData($stmt);
    }

    public function create(Exercise $model): void
    {
        $array = array(
            $model->get_user_id(),
            $model->get_description(),
            $model->get_solution(),
            $model->get_title(),
            $model->get_category(),
            $model->get_subcategory(),
            $model->get_difficulty(), 
            "assets/pp_default.svg" // TODO: add exercise picture if available
        );
        $this->database->create($array);
    }

    public function update(Exercise $model): void
    {
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
