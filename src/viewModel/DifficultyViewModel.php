<?php

require_once('ViewModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/models/Difficulty.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/database/DifficultyDatabase.php');

class DifficultyViewModel extends ViewModel
{
    private DifficultyDatabase $database;

    /**
     * DifficultyViewModel constructor.
     */
    public function __construct()
    {
        $this->database = new DifficultyDatabase();
    }

    /**
     * Queries the database and returns the Difficulty with the given ID
     *
     * @param integer $id The ID of the Difficulty in the database
     * @return Difficulty The queried Difficulty
     */
    public function get_by_id(int $id): Difficulty
    {
        $stmt = $this->database->query_by_id($id);
        $task_array = $this->fetchData($stmt);
        return $this->returnModel($task_array);
    }
    public function get_all(): array
    {
        $stmt = $this->database->query_all();
        return $this->fetchData($stmt);
    }

    protected function fetchData(PDOStatement $stmt): array
    {
        $task_array = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $task = Difficulty::from_pdo_statement($row);
            array_push($task_array, $task);
        }
        return $task_array;
    }

    /**
     * Returns only one Difficulty from an array of difficulties.
     *
     * @param array $array An array with difficulties
     * @return Difficulty Returns only one Difficulty. If there are more or less than one element in the array the method
     * throws an exception
     */
    protected function returnModel(array $array): Difficulty
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
