<?php /* Smarty version Smarty-3.0.8, created on 2011-09-04 10:34:31
         compiled from "/Users/jaceju/Sites/phpconf.tw/application/views/scripts/error/error.phtml" */ ?>
<?php /*%%SmartyHeaderCode:12739177164e62e3b7d55d58-97632370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb284a4476ad24c8dafacdb28e29669b300a3789' => 
    array (
      0 => '/Users/jaceju/Sites/phpconf.tw/application/views/scripts/error/error.phtml',
      1 => 1315103669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12739177164e62e3b7d55d58-97632370',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>An error occurred</h1>
<h2><?php echo $_smarty_tpl->getVariable('message')->value;?>
</h2>

<?php if ($_smarty_tpl->getVariable('exception')->value){?>

<h3>Exception information:</h3>
<p>
  <b>Message:</b> <?php echo $_smarty_tpl->getVariable('exception')->value->getMessage();?>

</p>

<h3>Stack trace:</h3>
<pre><?php echo $_smarty_tpl->getVariable('exception')->value->getTraceAsString();?>

</pre>

<h3>Request Parameters:</h3>
<pre><?php echo var_export($_smarty_tpl->getVariable('this')->value->request->getParams(),true);?>

</pre>

<?php }?>
