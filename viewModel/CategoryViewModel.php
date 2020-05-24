<?php

include_once('ViewModel.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/models/Category.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/CategoryDatabase.php');

class CategoryViewModel extends ViewModel
{
    private CategoryDatabase $database;

    /**
     * CategoryViewModel constructor.
     */
    public function __construct()
    {
        $this->database = new CategoryDatabase();
    }

    /**
     * Queries the database and returns the Category with the given ID
     *
     * @param integer $id The ID of the Category in the database
     * @return Category The queried Category
     */
    public function get_by_id(int $id): Category
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
            $task = Category::from_pdo_statement($row);
            array_push($task_array, $task);
        }
        return $task_array;
    }

    /**
     * Returns only one Category from an array of categories.
     *
     * @param array $array An array with categories
     * @return Category Returns only one Category. If there are more or less than one element in the array the method
     * throws an exception
     */
    protected function returnModel(array $array): Category
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
