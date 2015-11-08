<?php

namespace Layer\Manager;

interface EntityManagerInterface
{
    /**
     * @param $entity
     * @return bool
     */
    public function save($entity);

    /**
     * @param $entity
     * @return bool
     */
    public function remove($entity);

    /**
     * @param int $id
     * @return mixed
     */
    public function find($id);

    /**
     * @return array
     */
    public function findAll();

    /**
     * @param array $attributes
     * @return array
     */
    public function findBy(array $attributes);
}