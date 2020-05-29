<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");

require_once('ViewModel.php');
require_once($path['src'] . '/models/Exercise.php');
require_once($path['src'] . '/database/ExerciseDatabase.php');

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

    /**
     * Inserts an Exercise into the database and returns the ID of it.
     *
     * @param Exercise $model The Exercise to to insert
     * @return int|null The ID of the database entry. Returns Null on error
     */
    public function create(Exercise $model)
    {
        $array = $model->toArray();
        $stmt = $this->database->create($array);

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $row['id'];
        } else {
            return null;
        }
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
