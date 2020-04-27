<?php

abstract class ViewModel
{

    private Database $database;

    abstract public function get_by_id(int $id): Model;

    abstract protected function fetchData(PDOStatement $stmt): array;

    abstract protected function returnModel(array $array): Model;

    public function get_all(): array
    {
        $stmt = $this->database->query_all();
        return $this->fetchData($stmt);
    }


}
