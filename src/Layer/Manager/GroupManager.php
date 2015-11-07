<?php

namespace Layer\Manager;
namespace Layer\Connector;
namespace Layer\Entity;

use PDO;

class GroupManager extends Connector implements DbManagerInterface
{
    public function find($id)
    {
        $stmt = $DBH->prepare('SELECT * FROM group WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $group = $this->format($row);

        return $group;
    }

    public function findAll()
    {
        $stmt = $DBH->prepare('SELECT * FROM group');
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

        $sql = 'SELECT * FROM group WHERE ' . implode(' AND ', $attributeBindings);
        $stmt = $DBH->prepare($sql);
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
            $stmt = $dbh->prepare('UPDATE group SET name = :name WHERE id = :id');

            return $stmt->execute([
                'id' => $group->getId(),
                'name' -> $group->getName()
            ]);
        } else {
            $stmt = $dbh->prepare('INSERT INTO group SET name = :name');

            return $stmt->execute(['name' => $group->getName()]);
        }
    }

    public function remove(Group $group)
    {
        $stmt = $dbh->prepare('DELETE FROM group WHERE id = :id');

        return $stmt->execute(['id' => $group->getId()]);
    }
}
