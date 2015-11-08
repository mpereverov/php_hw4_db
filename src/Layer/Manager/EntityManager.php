<?php

namespace Layer\Manager;

abstract class EntityManager implements EntityManagerInterface
{
    protected $connection;
    
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
}