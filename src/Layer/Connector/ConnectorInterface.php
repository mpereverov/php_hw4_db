<?php
namespace Layer\Connector;
/**
 * Interface ConnectorInterface
 * @package Layer\Connector
 */

interface ConnectorInterface
{

    /**
     * @param array $config
     * @return mixed
     * @internal param $dbs
     * @internal param $user
     * @internal param $pass
     */
    public function connect(array $config);

    /**
     * @param $DBH
     * @return mixed
     */
    public function connectClose($DBH);
}