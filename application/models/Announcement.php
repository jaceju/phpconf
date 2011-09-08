<?php

class Phpconf_Model_Announcement extends Zend_Db_Table_Row_Abstract
{
    /**
     *
     * @param int $page
     * @return Zend_Paginator_Adapter_DbTableSelect
     */
    public function fetchPagedAnnouncements($conferenceId, $page = 1)
    {

        $select = $announcementTable->select()
                ->where('conferenceId = ?', $conferenceId)
                ->order('id DESC');
        $paginator = Zend_Paginator::factory($select);
        $paginator->setCurrentPageNumber($page);
        return $paginator;
    }

}

