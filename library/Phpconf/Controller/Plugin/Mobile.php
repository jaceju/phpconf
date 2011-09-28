<?php

class Phpconf_Controller_Plugin_Mobile extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        $userAgent = $request->getServer('HTTP_USER_AGENT');
    }

}