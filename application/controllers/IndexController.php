<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->year = $this->getRequest()->getParam('year');
    }

    public function indexAction()
    {

    }


}

