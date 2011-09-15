<?php

class IndexController extends Zend_Controller_Action
{
    /**
     *
     * @var Phpconf_Model_Conference
     */
    protected $_conference = null;

    public function preDispatch()
    {
        $this->_conference = $this->getHelper('Conference')->getConference();
    }

    public function indexAction()
    {
        $this->view->announcements = $this->_conference->fetchLatestAnnouncements();
    }

    public function sessionsAction()
    {
        $this->view->sessions = $this->_conference->fetchSessions();
    }

    public function locationAction()
    {
        $this->view->conference = $this->_conference;
    }

    public function staffsAction()
    {
        $this->view->jobs = $this->_conference->fetchJobs();
        $this->view->staffs = $this->_conference->fetchStaffs();
    }
}

