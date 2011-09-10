<?php

require_once __DIR__ . '/IndexController.php';

class AdminController extends IndexController
{
    private $_currentAdmin = null;

    public function preDispatch()
    {
        $request = $this->getRequest();
        $this->_currentAdmin = $request->getParam('admin');

        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->currentAdmin = $this->_currentAdmin;
        }
    }

    public function loginAction()
    {
        $form = new Phpconf_Form_Login();
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $loginConfig = array(
                    'username' => $this->_currentAdmin,
                    'password' => $request->getPost('password'),
                );
                if ($this->_process($loginConfig)) {
                    $this->getHelper('redirector')->gotoRoute(array(
                        'action' => 'index',
                    ), 'admin');
                }
            }
        }
        $this->view->form = $form;
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index');
    }

    protected function _process($values)
    {
        $adapter = $this->_getAuthAdapter();
        $adapter->setIdentity($values['username']);
        $adapter->setCredential($values['password']);

        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($adapter);
        if ($result->isValid()) {
            $user = $adapter->getResultRowObject();
            $auth->getStorage()->write($user);
            return true;
        }
        return false;
    }

    protected function _getAuthAdapter()
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $authAdapter->setTableName('administrators')
            ->setIdentityColumn('name')
            ->setCredentialColumn('passwd')
            ->setCredentialTreatment('SHA1(?)');

        return $authAdapter;
    }
}

