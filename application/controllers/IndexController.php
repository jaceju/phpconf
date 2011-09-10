<?php

class IndexController extends Zend_Controller_Action
{
    /**
     *
     * @var Phpconf_Model_Conference
     */
    private $_conference = null;

    public function init()
    {
        $year = $this->getRequest()->getParam('year');
        $this->_conference = Phpconf_Model_Conference::getInstanceFromYear($year);
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

    public function sponsorsAction()
    {
        $this->view->sponsors = $this->_conference->fetchSponsors();
    }
}

