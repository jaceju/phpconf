<?php

class Phpconf_Model_DbTable_Jobs extends Zend_Db_Table_Abstract
{

    protected $_name = 'jobs';

    /**
     *
     * @var Phpconf_Model_DbTable_Jobs
     */
    private static $_instance = null;

    /**
     *
     * @param array $config
     * @return Phpconf_Model_DbTable_Jobs
     */
    public function getInstance($config = array())
    {
        if (null === self::$_instance) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }
}

