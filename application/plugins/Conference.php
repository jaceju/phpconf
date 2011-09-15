<?php

class Phpconf_Plugin_Conference extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        if ('admin' !== $request->getControllerName()) {
            Zend_Controller_Action_HelperBroker::getStaticHelper('Conference');
        }
    }

}

