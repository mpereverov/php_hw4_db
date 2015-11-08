<?php

namespace Layer\Manager;

use Layer\Entity\Group;
use PDO;

class UserManager extends ConnectorManager implements DbManagerInterface
{
    public function find($id)
    {
        $stmt = $this->DBH->prepare('SELECT * FROM hw4_user WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $group = $this->format($row);

        return $group;
    }

    public function findAll()
    {
        $stmt = $this->DBH->prepare('SELECT * FROM hw4_user');
        $stmt->execute();

        $groups = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $groups[] = $this->format($row);
        }

        return $groups;
    }

    public function findBy(array $attributes)
    {
        $attributeBindings = [];
        foreach (array_keys($attributes) as $name) {
            $attributeBindings[] = "$name = :$name";
        }

        $sql = 'SELECT * FROM hw4_user WHERE ' . implode(' AND ', $attributeBindings);
        $stmt = $this->DBH->prepare($sql);
        $stmt->execute($attributes);

        $groups = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $groups[] = $this->format($row);
        }

        return $groups;
    }

    protected function format(array $row)
    {
        $group = new Group();
        $group->setId($row['id']);
        $group->setName($row['name']);

        return $group;
    }

    public function save(Group $group)
    {
        if ($group->getId()) {
            $stmt = $this->DBH->prepare('UPDATE hw4_user SET name = :name WHERE id = :id');

            return $stmt->execute([
                'id' => $group->getId(),
                'name' -> $group->getName()
            ]);
        } else {
            $stmt = $this->DBH->prepare('INSERT INTO hw4_user SET name = :name');

            return $stmt->execute(['name' => $group->getName()]);
        }
    }

    public function remove(Group $group)
    {
        $stmt = $this->DBH->prepare('DELETE FROM hw4_user WHERE id = :id');

        return $stmt->execute(['id' => $group->getId()]);
    }
}
//
//SELECT u.*
//FROM users_groups ug
//INNER JOIN user u ON u.id = ug.user_id
//WHERE ug.group_id = :group_id
    
