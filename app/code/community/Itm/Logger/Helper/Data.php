<?php
/**
 * Created by ITM design GmbH
 *
 * @file Data.php
 * @author Jens Averkamp <j.averkamp@itm-systems.com>
 * @copyright Itm design GmbH
 * @link http://www.itm-design.com
 *
 * Date: 01.10.12 16:38
 */
require_once 'lib/Itm/ChromePhp/ChromePhp.php';

class Itm_Logger_Helper_Data extends Mage_Core_Helper_Abstract implements Itm_Logger_Model_Logger
{
    const ITM_LOGGER_CONFIG_ENABLE      = 'itm/logger/enabled';
    const ITM_LOGGER_CONFIG_ONLY_DEV    = 'itm/logger/onlydev';

    protected $logger = array();
    protected $logger_classes = array(
        'logger/chromePhp',
        'logger/firePhp',
    );

    public function __construct()
    {
        if(!$this->canLog())
            return;

        foreach($this->logger_classes as $logger)
        {
            $logger = Mage::getModel($logger);
            if($logger instanceof Itm_Logger_Model_Logger && $logger->canLog())
                $this->logger[] = $logger;
        }
    }

    public function log($message)
    {
        foreach($this->logger as $logger)
        {
            $logger->log($message);
        }
    }

    public function info($message)
    {
        foreach($this->logger as $logger)
        {
            $logger->info($message);
        }
    }

    public function warn($message)
    {
        foreach($this->logger as $logger)
        {
            $logger->warn($message);
        }
    }

    public function error($message)
    {
        foreach($this->logger as $logger)
        {
            $logger->error($message);
        }
    }

    public function canLog()
    {
        // Nur Loggen wenn die Extension "eingeschaltet ist"
        if(!Mage::getStoreConfig(self::ITM_LOGGER_CONFIG_ENABLE))
            return false;

        // Nur Loggen wenn Magento sich im Dev Mode befindet
        if(Mage::getStoreConfig(self::ITM_LOGGER_CONFIG_ONLY_DEV) && !Mage::getIsDeveloperMode())
            return false;


        return true;
    }
}
