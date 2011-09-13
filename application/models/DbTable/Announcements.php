<?php

class Phpconf_Model_DbTable_Announcements extends Zend_Db_Table_Abstract
{

    protected $_name = 'announcements';

    protected $_referenceMap = array(
        'Conference' => array(
            'columns' => 'conferenceId', // 對應到 announcements.conferenceId
            'refTableClass' => 'Phpconf_Model_DbTable_Conferences',
            'refColumns' => 'id', // 對應到 conference.id
        ),
    );

    /**
     *
     * @var Phpconf_Model_DbTable_Announcements
     */
    private static $_instance = null;

    /**
     *
     * @param array $config
     * @return Phpconf_Model_DbTable_Announcements
     */
    public static function getInstance($config = array())
    {
        if (null === self::$_instance) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }
}

