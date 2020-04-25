<?php

interface Model
{
    public static function from_pdo_statement(PDOStatement $stmt);
}
