<?php

abstract class ViewModel
{

    private Database $database;

    /**
     * Queries the database and returns the Model with the given ID
     *
     * @param integer $id The ID of the Model in the database
     * @return Model The queried User
     */
    abstract public function get_by_id(int $id): Model;

    /**
     * Mapps the `PDOStatement` from the database into an array of Models.
     *
     * @param PDOStatement $stmt The result of an database query
     * @return array An array of Models
     */
    abstract protected function fetchData(PDOStatement $stmt): array;

    /**
     * Returns only one Exercise from an array of Tasks.
     *
     * @param array $array An array with Tasks
     * @return Model Returns only one Exercise. If there are more or less than 
     * one element in the array the method
     * @throws NoDatabaseEntryException Throws an `NoDatabaseEntryException` if the database 
     * query returns with an empty table
     */
    abstract protected function returnModel(array $array): Model;

    /**
     * Queries the database and return all the Models.
     *
     * @return array An array containing all the Models
     */
    abstract function get_all(): array;
}
