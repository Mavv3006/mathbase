<?php

abstract class ViewModel
{

    private Database $database;

    abstract public function get_by_id(int $id): Model;

    abstract protected function fetchData(PDOStatement $stmt): array;

    abstract protected function returnModel(array $array): Model;

    abstract function get_all(): array;
}
