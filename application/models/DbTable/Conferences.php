<?php

class Phpconf_Model_DbTable_Conferences extends Zend_Db_Table_Abstract
{

    protected $_name = 'conferences';

    protected $_rowClass = 'Phpconf_Model_Conference';

    protected $_dependentTables = array(
        'Phpconf_Model_DbTable_Announcements',
        'Phpconf_Model_DbTable_Sesssions',
        'Phpconf_Model_DbTable_Staffs',
        'Phpconf_Model_DbTable_Sponsors',
    );

    /**
     *
     * @var Phpconf_Model_DbTable_Conferences
     */
    private static $_instance = null;

    /**
     *
     * @param array $config
     * @return Phpconf_Model_DbTable_Conferences
     */
    public function getInstance($config = array())
    {
        if (null === self::$_instance) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }
}

