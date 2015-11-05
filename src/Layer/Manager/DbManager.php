<?php

namespace Layer\Manager;


class DbManager implements ManagerInterface
{

     public $STH;

    /**
     * Insert new entity data to the DB
     * @param mixed $STH
     * @return mixed
     */
    public function insert($STH)
    {
        $this->STH = $DBH->prepare("INSERT INTO folks (name, addr, city) values (:name, :addr, :city)");
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