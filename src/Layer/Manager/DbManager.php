<?php

namespace Layer\Manager;

use Layer\Connector\Connector;

class DbManager extends Connector implements DbManagerInterface
{

    protected $STH;


    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity)
    {
        $this->STH = $this->DBH->prepare("INSERT INTO hw4_user (first_name, last_name, password) values (:first_name, :last_name, :password)");
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        // TODO: Implement update() method.
    }

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        // TODO: Implement remove() method.
    }

    public function find($entityName, $id)
    {
        // TODO: Implement find() method.
    }

    /**
     * Search all entity data in the DB
     * @param $entityName
     * @return array
     */
    public function findAll($entityName)
    {
        // TODO: Implement findAll() method.
    }

    /**
     * Search all entity data in the DB like $criteria rules
     * @param $entityName
     * @param array $criteria
     * @return mixed
     */
    public function findBy($entityName, $criteria = [])
    {
        // TODO: Implement findBy() method.
    }
}