<?php
/**
 * @see Zend_Controller_Plugin_Abstract
 */
require_once 'Zend/Controller/Plugin/Abstract.php';

/**
 * 動態處理 Smarty 的路徑屬性
 *
 */
class Phpconf_Controller_Plugin_View_Smarty extends Zend_Controller_Plugin_Abstract
{
    /**
     * 動態切換 template_dir 及 compile_dir
     *
     * @param Zend_Controller_Request_Abstract $request
     */
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        // Set ViewRenderer
        $frontController = Zend_Controller_Front::getInstance();
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $smarty = $viewRenderer->view->getEngine();

        // 處理 Smarty 路徑
        if ($frontController->getDefaultModule() != $request->getModuleName()) {
            $smarty->compile_dir .= '/' . $this->getRequest()->getModuleName();
            if (!file_exists($smarty->compile_dir)) {
                mkdir($smarty->compile_dir);
            }
        }
    }
}