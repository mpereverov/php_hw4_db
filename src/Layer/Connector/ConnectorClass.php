<?php

namespace Layer\Connector;

use PDO;
use PDOException;

class Connector implements ConnectorInterface
{
    private $DBH;

    /**
     * @param $dbs
     * @param $user
     * @param $pass
     * @return PDO
     */
    public function connect($dbs, $user, $pass)
    {
        try {
            $this->DBH = new PDO($dbs, $user, $pass);
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $err) {
            echo $err->getMessage();
        }
        return $this->DBH;
    }

    public function connectClose($DBH)
    {
        $this->DBH = null;
    }

}