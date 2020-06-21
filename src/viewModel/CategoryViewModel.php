<?php

require_once('ViewModel.php');
require_once($path['src'] . '/models/Category.php');
require_once($path['src'] . '/database/CategoryDatabase.php');

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
    /**
     * Queries the database and returns every category
     *
     * @return array All categories in an array
     */
    public function get_all(): array
    {
        $stmt = $this->database->query_all();
        return $this->fetchData($stmt);
    }
    /**
     * Turns the result of the query into an array of categories.
     * For each line, a category is fetched and pushed into the array.
     *
     * @param PDOStatement Database Query
     * @return array All categories in an array
     */
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
