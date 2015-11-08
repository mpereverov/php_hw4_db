<?php

namespace Layer\Connector;

use PDO;
use PDOException;

class ConnectorPDO implements ConnectorInterface
{
    /**
     * @param array $config
     * @return PDO
     */
    public function connect(array $config)
    {
        try {
            $dsn = 'mysql:host=' . $config['host'] .
                ';port=' . $config['port'] . 
                ';dbname=' . $config['name'];
            $connection = new PDO($dsn, $config['user'], $config['password']);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $err) {
            var_dump($err->getMessage());
            return false;
        }

        return $connection;
    }
}