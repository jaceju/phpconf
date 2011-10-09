<?php

class Phpconf_Model_DbTable_Talkers extends Zend_Db_Table_Abstract
{

    protected $_name = 'talkers';

    protected $_referenceMap = array(
        'Conference' => array(
            'columns' => 'conferenceId', // 對應到 staffs.conferenceId
            'refTableClass' => 'Phpconf_Model_DbTable_Conferences',
            'refColumns' => 'id', // 對應到 conference.id
        ),
    );

    /**
     *
     * @var Phpconf_Model_DbTable_Talkers
     */
    private static $_instance = null;

    /**
     *
     * @param array $config
     * @return Phpconf_Model_DbTable_Talkers
     */
    public static function getInstance($config = array())
    {
        if (null === self::$_instance) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }
}

