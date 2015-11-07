<?php

namespace Layer\Connector;

use PDO;
use PDOException;

class Connector implements ConnectorInterface
{
    protected $DBH;

    /**
     * @param array $config
     * @return PDO
     */
    public function connect(array $config)
    {
        try {
            $dsn = 'mysql:host=' . $config['host'] .
                ';port=' . $config['port'] . 
                ';dbname=' . $config['db_name'];
            $this->DBH = new PDO($dsn, $config['db_user'], $config['db_password']);
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $err) {
            return false;
        }
        return $this->DBH;
    }

    public function connectClose($DBH)
    {
        $this->DBH = null;
    }

}