<?php

namespace Layer\Manager;

use PDO;
use Layer\Entity\Group;

class GroupManager extends EntityManager
{
    /**
     * @param int $id
     * @return Group
     */
    public function find($id)
    {
        $stmt = $this->connection->prepare('SELECT * FROM hw4_group WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $group = $this->format($row);

        return $group;
    }

    /**
     * @return Group[]
     */
    public function findAll()
    {
        $stmt = $this->connection->prepare('SELECT * FROM hw4_group');
        $stmt->execute();

        $groups = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $groups[] = $this->format($row);
        }

        return $groups;
    }

    /**
     * @param array $attributes ex.: ['active' => 1]
     * @return Group[]
     */
    public function findBy(array $attributes)
    {
        $attributeBindings = [];
        foreach (array_keys($attributes) as $name) {
            $attributeBindings[] = "$name = :$name";
        }

        $sql = 'SELECT * FROM hw4_group WHERE ' . implode(' AND ', $attributeBindings);
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($attributes);

        $groups = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $groups[] = $this->format($row);
        }

        return $groups;
    }

    /**
     * @param array $row
     * @return Group
     */
    protected function format(array $row)
    {
        $group = new Group();

        $group->setId($row['id']);
        $group->setName($row['name']);

        return $group;
    }

    /**
     * @param Group $entity
     * @return bool
     */
    public function save($entity)
    {
        if ($entity->getId()) {
            $stmt = $this->connection->prepare('UPDATE hw4_group SET name = :name WHERE id = :id');

            return $stmt->execute([
                'id' => $entity->getId(),
                'name' => $entity->getName(),
            ]);
        } else {
            $stmt = $this->connection->prepare('INSERT INTO hw4_group SET name = :name');

            return $stmt->execute(['name' => $entity->getName()]);
        }
    }

    /**
     * @param Group $group
     * @return bool
     */
    public function remove($entity)
    {
        $stmt = $this->connection->prepare('DELETE FROM hw4_group WHERE id = :id');

        return $stmt->execute(['id' => $entity->getId()]);
    }
}
