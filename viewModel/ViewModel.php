<?php

abstract class ViewModel
{

    private $database;

    abstract public function get_by_id(int $id): Model;
}
