<?php

namespace Layer\Connector;

use PDO;
use PDOException;

class Connector implements ConnectorInterface
{
    private $db;

    public function connect()
    {
        try {
            $connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
            $db = new PDO($connect_str,DB_USER,DB_PASS);
        }
        return $DBH;
    }

    public function connectClose($db)
    {

    }

}