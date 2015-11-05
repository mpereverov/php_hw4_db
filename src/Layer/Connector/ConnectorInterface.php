<?php
namespace Layer\Connector;
/**
 * Interface ConnectorInterface
 * @package Layer\Connector
 */

interface ConnectorInterface
{

    /**
     * @param $dbs
     * @param $user
     * @param $pass
     * @return mixed
     */
    public function connect($dbs, $user, $pass);

    /**
     * @param $DBH
     * @return mixed
     */
    public function connectClose($DBH);
}