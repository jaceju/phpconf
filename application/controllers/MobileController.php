<?php

class MobileController extends Zend_Controller_Action
{

    public function preDispatch()
    {
        $this->_conference = $this->getHelper('Conference')->getConference();
        $this->view->conference = $this->_conference;
        $this->view->actionName = $this->getRequest()->getActionName();
        $this->getHelper('layout')->disableLayout();
    }

    public function indexAction()
    {
        $this->view->announcements = $this->_conference->fetchLatestAnnouncements();
        $this->view->conference = $this->_conference;
        $this->view->sessions = $this->_conference->fetchSessions();
        $this->view->jobs = $this->_conference->fetchJobs();
        $this->view->staffs = $this->_conference->fetchStaffs();
    }

}

