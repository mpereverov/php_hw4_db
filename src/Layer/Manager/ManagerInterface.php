<?php

namespace Layer\Manager;

interface ManagerInterface
{
    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity);
    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($entity);
    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity);
}