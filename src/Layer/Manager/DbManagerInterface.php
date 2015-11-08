<?php

namespace Layer\Manager;

use Layer\Entity\Group;

interface DbManagerInterface
{

    public function save(Group $group);

    /**
     * Delete entity data from the DB
     * @param Group $group
     * @return mixed
     * @internal param $entity
     */
    public function remove(Group $group);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Search all entity data in the DB
     * @return array
     */
    public function findAll();

    /**
     * Search all entity data in the DB like $criteria rules
     * @param array $attributes
     * @return mixed
     */
    public function findBy(array $attributes);
}