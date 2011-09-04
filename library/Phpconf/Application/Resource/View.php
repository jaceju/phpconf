<?php
/**
 * @see Zend_Application_Resource_View
 */
require_once 'Zend/Application/Resource/View.php';

/**
 * 處理視圖引擎
 *
 */
class Phpconf_Application_Resource_View extends Zend_Application_Resource_View
{
    /**
     * 視圖物件選項
     *
     * @var array
     */
    protected $_options = array();

    /**
     * 視圖物件
     *
     * @var Zend_View
     */
    protected $_view = null;

    /**
     * 初始化視圖物件
     *
     */
    public function init()
    {
        parent::init();
        $this->_setControllerPlugin();
        $this->_setViewRenderer();
        $this->_setLayout();
        return $this->getView();
    }

    /**
     * 取得引擎名稱
     *
     * @return string
     */
    protected function _getEngineName()
    {
        return isset($this->_options['engine'])
             ? ucfirst(strtolower(trim($this->_options['engine'])))
             : null;
    }

    /**
     * 設定 Controller Plugin
     *
     */
    protected function _setControllerPlugin()
    {
        $engineName = $this->_getEngineName();
        if ($engineName) {
            $pluginName = 'Phpconf_Controller_Plugin_View_' . $this->_getEngineName();
            Zend_Controller_Front::getInstance()->registerPlugin(new $pluginName());
        }
    }

    /**
     * 將 View 置入到 ViewRenderer
     *
     */
    protected function _setViewRenderer()
    {
        parent::init(); // Set View into ViewRenderer
        if (isset($this->_options['viewSuffix'])) {
            Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer')
                ->setViewSuffix($this->_options['viewSuffix']);
        }
    }

    /**
     * 將 View 置入到 Layout
     *
     */
    protected function _setLayout()
    {
        $bootstrap = $this->getBootstrap();
        if ($bootstrap->hasPluginResource('layout')) {
            $bootstrap->bootstrap('layout');
            $bootstrap->getPluginResource('layout')->getLayout()->setView($this->getView());
        }
    }

    /**
     * 取得視圖物件
     *
     * @return Zend_View
     */
    public function getView()
    {
        if (null == $this->_view) {
            $engineName = $this->_getEngineName();
            if (null === $engineName) {
                $this->_view = parent::getView();
            } else {
                $viewName = 'Phpconf_View_' . $this->_getEngineName();
                $options = $this->getOptions();
                $this->_view = new $viewName($options);
                if (isset($options['doctype'])) {
                    $this->_view->doctype()->setDoctype(strtoupper($options['doctype']));
                }
            }
        }
        return $this->_view;
    }
}