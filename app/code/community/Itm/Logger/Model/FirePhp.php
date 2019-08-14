<?php
/**
 * Created by ITM design GmbH
 *
 * @file FireBug.php
 * @author Jens Averkamp <j.averkamp@itm-systems.com>
 * @copyright Itm design GmbH
 * @link http://www.itm-design.com
 *
 * Date: 02.10.12 09:34
 */
require_once 'lib/Itm/FirePhp/FirePHP.class.php';

class Itm_Logger_Model_FirePhp implements Itm_Logger_Model_Logger
{
    protected $logger   = null;
    protected $writter  = null;

    const Itm_LOGGER_CONFIG_FIREPHP     = 'itm/logger/firephp';

    public function __construct()
    {
        $this->logger  = FirePHP::getInstance(true);
    }

    public function log($message)
    {
        if($this->canLog())
            $this->logger->log($message);

        return $this;
    }

    public function info($message)
    {
        if($this->canLog())
            $this->logger->info($message);

        return $this;
    }

    public function warn($message)
    {
        if($this->canLog())
            $this->logger->warn($message);

        return $this;
    }

    public function error($message)
    {
        if($this->canLog())
            $this->logger->error($message);

        return $this;
    }

    public function canLog()
    {
        if(!Mage::getStoreConfig(self::Itm_LOGGER_CONFIG_FIREPHP))
            return false;

        return true;
    }
}
