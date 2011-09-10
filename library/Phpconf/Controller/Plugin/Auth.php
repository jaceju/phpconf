<?php

class Phpconf_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();
        if ($this->_isLogin($request) && !$auth->hasIdentity()) {
            $request->setActionName('login');
        }
    }

    protected function _isLogin(Zend_Controller_Request_Abstract $request)
    {
        return ('admin' === $request->getControllerName()
                && 'login' !== $request->getActionName());
    }
}

