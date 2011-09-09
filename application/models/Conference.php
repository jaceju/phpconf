<?php

class Phpconf_Model_Conference extends Zend_Db_Table_Row_Abstract
{
    /**
     *
     * @param string $year
     * @return Phpconf_Model_Conference
     */
    public static function getInstanceFromYear($year)
    {
        $conferenceTable = new Phpconf_Model_DbTable_Conferences();
        $select = $conferenceTable->select()
                ->where('year = ?', $year);
        return $conferenceTable->fetchRow($select);
    }

    /**
     *
     * @return Zend_Db_Table_Rowset
     */
    public function fetchLatestAnnouncements()
    {
        $announcementTable = Phpconf_Model_DbTable_Announcements::getInstance();
        $select = $announcementTable->select()
                ->where('published', 'y')
                ->order('id DESC');
        return $this->findDependentRowset('Phpconf_Model_DbTable_Announcements', 'Conference', $select);
    }

    /**
     *
     * @return Zend_Db_Table_Rowset
     */
    public function fetchSessions()
    {
        $sessionTable = Phpconf_Model_DbTable_Sessions::getInstance();
        $select = $sessionTable->select()
                ->order('startTime');
        return $this->findDependentRowset('Phpconf_Model_DbTable_Sessions', 'Conference', $select);
    }

    /**
     *
     * @return Zend_Db_Table_Rowset
     */
    public function fetchStaffs()
    {
        $staffTable = Phpconf_Model_DbTable_Staffs::getInstance();
        $select = $staffTable->select()
                ->order('name');
        return $this->findDependentRowset('Phpconf_Model_DbTable_Staffs', 'Conference', $select);
    }

    /**
     *
     * @return Zend_Db_Table_Rowset
     */
    public function fetchJobs()
    {
        $jobTable = Phpconf_Model_DbTable_Jobs::getInstance();
        $select = $jobTable->select()
                ->order('sortOrder');
        return $jobTable->fetchAll($select);
    }

    /**
     *
     * @return Zend_Db_Table_Rowset
     */
    public function fetchSponsors()
    {
        $sponsorTable = Phpconf_Model_DbTable_Sponsors::getInstance();
        $select = $sponsorTable->select()
                ->order('name');
        return $this->findDependentRowset('Phpconf_Model_DbTable_Sponsors', 'Conference', $select);
    }
}

