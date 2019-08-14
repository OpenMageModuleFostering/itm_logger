<?php
/**
 * Created by ITM design GmbH
 *
 * @file ChromePhp.php
 * @author Jens Averkamp <j.averkamp@itm-systems.com>
 * @copyright Itm design GmbH
 * @link http://www.itm-design.com
 *
 * Date: 02.10.12 09:44
 */
require_once 'lib/Itm/ChromePhp/ChromePhp.php';

class Itm_Logger_Model_ChromePhp implements Itm_Logger_Model_Logger
{

    protected $logger = null;
    const ITM_LOGGER_CONFIG_CHROMEPHP   = 'itm/logger/chromephp';


    public function __construct()
    {
        $this->logger = ChromePhp::getInstance();
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
        if(!Mage::getStoreConfig(self::ITM_LOGGER_CONFIG_CHROMEPHP))
            return false;

        return true;
    }
}
