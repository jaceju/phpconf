<?php

require_once __DIR__ . '/IndexController.php';

class AdminController extends IndexController
{

    protected $_currentAdmin = null;

    public function init()
    {
        parent::init();
        $this->_helper->ajaxContext()
                ->addActionContext('announcement-edit', 'html')
                ->initContext();
    }

    public function preDispatch()
    {
        $request = $this->getRequest();
        $this->_currentAdmin = $request->getParam('admin');

        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->currentAdmin = $this->_currentAdmin;
        }

        $this->getHelper('layout')->setLayout('admin');
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
                    $this->getHelper('redirector')
                            ->gotoRouteAndExit(array(
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

    /**
     * @param array $values
     * @return bool
     *
     */
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

    /**
     * @return Zend_Auth_Adapter_DbTable
     *
     */
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

    public function conferencesAction()
    {
        $this->view->conferences
                = Phpconf_Model_Conference::fetchConferences();
    }

    public function conferenceEditAction()
    {
        $conferenceId = (int) $this->_getParam('id');
        $form = new Phpconf_Form_ConferenceEdit();
        $this->view->form = $form;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $formData = $request->getPost();
            if ($form->isValid($formData)) {
                Phpconf_Model_Conference::saveconference($conferenceId, $form->getValues());
                $this->getHelper('redirector')
                        ->gotoRouteAndExit(array(
                            'action' => 'conferences',
                            'id' => null,
                                ), 'admin');
            } else {
                $form->populate($formData);
            }
        } else {
            $conference = Phpconf_Model_Conference::fetchConferenceById($conferenceId);
            $form->populate($conference->toArray());
        }
    }

    public function announcementEditAction()
    {
        $announcementId = (int) $this->_getParam('id');
        $form = new Phpconf_Form_AnnouncementEdit();
        $form->setId($announcementId);
        $form->setConferenceId($this->_conference->id);
        $this->view->form = $form;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $formData = $request->getPost();
            if ($form->isValid($formData)) {
                $this->_conference
                        ->saveAnnouncement($announcementId, $form->getValues());
                $this->getHelper('redirector')
                        ->gotoRouteAndExit(array(
                            'action' => 'index',
                            'id' => null,
                                ), 'admin');
            } else {
                $form->populate($formData);
            }
        } else {
            $announcement = $this->_conference
                    ->fetchAnnouncementById($announcementId);
            $form->populate($announcement->toArray());
        }

    }

}



