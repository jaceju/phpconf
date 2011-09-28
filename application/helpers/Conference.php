<?php

class Phpconf_ActionHelper_Conference
        extends Zend_Controller_Action_Helper_Abstract
{
    /**
     *
     * @var Phpconf_Model_Conference
     */
    protected $_conference = null;

    public function init()
    {
        $year = $this->getRequest()->getParam('year');
        $controllerName = $this->getRequest()->getControllerName();

        $routerName = ('index' === $controllerName)
                    ? 'year'
                    : 'mobile';

        if (null === $year) {
            $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            /* @var $redirector Zend_Controller_Action_Helper_Redirector */
            $redirector->gotoRouteAndExit(array(
                        'year' => START_YEAR,
                    ), $routerName);
        }
        $this->_conference =
                Phpconf_Model_Conference::getInstanceFromYear($year);
    }

    public function preDispatch()
    {
        $this->getActionController()->view->sponsors
                = $this->_conference->fetchSponsors();
    }

    /**
     *
     * @return Phpconf_Model_Conference
     */
    public function getConference()
    {
        return $this->_conference;
    }
}

