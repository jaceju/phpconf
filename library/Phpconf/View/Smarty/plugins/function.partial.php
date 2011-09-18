<?php
/**
 * Smarty plugin
 *
 * 顯示子樣版
 *
 * @version     $Id$
 */

/**
 * smarty_function_partial
 *
 * @param array $params
 * @param Smarty $smarty
 * @param object $template template object
 * @return string
 */
function smarty_function_partial(array $params, Smarty $smarty, $template)
{
    if (!isset($params['name'])) {
        $smarty->trigger_error("content: missing 'name' parameter", E_USER_ERROR, __FILE__, __LINE__);
        return;
    }

    $view = $smarty->getTemplateVars('this'); /* @var $view Zend_View_Abstract */
    $layout = $view->layout();
    $cleanTemplateVars = $smarty->getTemplateVars();
    $newTemplateVars = array_merge($cleanTemplateVars, $params);
    $scriptName = trim($params['name'])
                . '.' . $layout->getViewSuffix();
    unset($params['name']);

    // 加入外部樣版參數
    $view->assign($newTemplateVars);

    // 處理樣版
    $result = $view->render($scriptName);

    // 回復樣版參數
    $view->clearVars();
    $view->assign($cleanTemplateVars);
    unset($cleanTemplateVars);

    // 回傳結果
    return $result;
}
