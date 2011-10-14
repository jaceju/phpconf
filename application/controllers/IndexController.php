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
        $this->view->conference = $this->_conference;
        $this->view->actionName = $this->getRequest()->getActionName();
    }

    public function indexAction()
    {
        $this->view->announcements = $this->_conference->fetchLatestAnnouncements();
    }

    public function locationAction()
    {

    }

    public function sessionsAction()
    {
        $this->view->sessions = $this->_conference->fetchSessions();
    }

    public function talkersAction()
    {
        $this->view->talkers = $this->_conference->fetchTalkers();
    }

    public function staffsAction()
    {
        $this->view->jobs = $this->_conference->fetchJobs();
        $this->view->staffs = $this->_conference->fetchStaffs();
    }

    public function mobileAction()
    {
        $this->getHelper('layout')->disableLayout();
        $this->view->announcements = $this->_conference->fetchLatestAnnouncements();
        $this->view->sessions = $this->_conference->fetchSessions();
    }

    public function oembedAction()
    {
        $this->getHelper('layout')->disableLayout();
        $this->getHelper('viewRenderer')->setNoRender();
        $oEmbedData = array(
            'version' => '1.0',
            'type' => 'article',
            'title' => 'PHPConf Taiwan ' . $this->_conference->year,
            'url' => 'http://phpconf.tw/img/logo/phpconf.jpg',
            'provider_name' => 'PHPConf Taiwan',
            'provider_url' => 'http://phpconf.tw/',
        );

        echo Zend_Json::encode($oEmbedData);
    }

}

