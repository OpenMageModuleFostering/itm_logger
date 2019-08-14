<?php
/**
 * Created by ITM design GmbH
 *
 * @file Logger.php
 * @author Jens Averkamp <j.averkamp@itm-systems.com>
 * @copyright Itm design GmbH
 * @link http://www.itm-design.com
 *
 * Date: 02.10.12 09:36
 */
interface Itm_Logger_Model_Logger
{
    public function log($message);
    public function info($message);
    public function warn($message);
    public function error($message);
    public function canLog();
}
