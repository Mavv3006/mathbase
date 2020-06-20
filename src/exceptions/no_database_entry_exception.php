<?php

class NoDatabaseEntryException extends Exception 
{
    const MESSAGE = 'Die Datenbank abfrage liefert ein leeres Ergebnis';
    const CODE = 1;

    /**
     * Erzeugt eine neue Exception, die bedeutet, dass zu einem SQL-Query eine 
     * leere Tabelle zurückgegeben wurde.
     */
    public function __construct()
    {
        parent::__construct(self::MESSAGE, self::CODE);
    }
}