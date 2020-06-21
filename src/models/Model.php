<?php

interface Model
{
    /**
     * Creates a Model from a database query
     *
     * @param array $row The fetched query from the database
     * @return Model The Model returned from the database
     */
    public static function from_pdo_statement(array $stmt): Model;
}
