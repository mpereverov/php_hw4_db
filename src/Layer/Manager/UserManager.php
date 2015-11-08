<?php

namespace Layer\Manager;

use PDO;
use Layer\Entity\User;

class UserManager extends EntityManager
{
    /**
     * @param int $id
     * @return User
     */
    public function find($id)
    {
        $stmt = $this->connection->prepare('SELECT * FROM hw4_user WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $group = $this->format($row);

        return $group;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        $stmt = $this->connection->prepare('SELECT * FROM hw4_user');
        $stmt->execute();

        $groups = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $groups[] = $this->format($row);
        }

        return $groups;
    }

    /**
     * @param array $attributes
     * @return Group[]
     */
    public function findBy(array $attributes)
    {
        $attributeBindings = [];
        foreach (array_keys($attributes) as $name) {
            $attributeBindings[] = "$name = :$name";
        }

        $sql = 'SELECT * FROM hw4_user WHERE ' . implode(' AND ', $attributeBindings);
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
     * @return User
     */
    protected function format(array $row)
    {
        $user = new User();

        $user->setId($row['id']);
        $user->setFirstName($row['first_name']);
        $user->setLastName($row['last_name']);
        $user->setPassword($row['password']);
        $user->setDescription($row['description']);
        $user->setGroup($row['group']);

        return $user;
    }

    /**
     * @param User $entity
     * @return bool
     */
    public function save($entity)
    {
        $fieldsSql = 
            'first_name  = :firstName,' .
            'last_name   = :lastName,' .
            'password    = :password,' .
            'description = :description,' .
            'group       = :group';

        $fields = [
            'firstName' => $entity->getFirstName(),
            'lastName' => $entity->getLastName(),
            'password' => $entity->getPassword(),
            'description' => $entity->getDescription(),
            'group' => $entity->getGroup(),
        ];
        
        if ($entity->getId()) {
            $sql = 'UPDATE hw4_user SET ' . $fieldsSql . ' WHERE id = :id';
            $fields['id'] = $entity->getId();
        } else {
            $sql = 'INSERT INTO hw4_user SET ' . $fieldsSql;
        }
        
        $stmt = $this->connection->prepare($sql);

        if (!$stmt->execute($fields)) {
            return false;
        }
        
        if ($entity->getGroup()) {
                $stmt = $this->connection->prepare('INSERT INTO hw4_group SET name = :name');
                $stmt->execute(['name' => $name]);
        }
        
        return true;
    }

    public function remove($entity)
    {
        $stmt = $this->connection->prepare('DELETE FROM hw4_user WHERE id = :id');

        return $stmt->execute(['id' => $entity->getId()]);
    }
}

