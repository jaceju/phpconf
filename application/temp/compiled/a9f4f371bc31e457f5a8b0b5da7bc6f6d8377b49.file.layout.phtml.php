<?php /* Smarty version Smarty-3.0.8, created on 2011-09-04 22:27:31
         compiled from "/Users/jaceju/Sites/phpconf.tw/application/layouts/scripts/layout.phtml" */ ?>
<?php /*%%SmartyHeaderCode:4910893624e638ad386ee93-37970923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9f4f371bc31e457f5a8b0b5da7bc6f6d8377b49' => 
    array (
      0 => '/Users/jaceju/Sites/phpconf.tw/application/layouts/scripts/layout.phtml',
      1 => 1315146450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4910893624e638ad386ee93-37970923',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html class="no-js" lang="zh-TW">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>PHPConf Taiwan <?php echo $_smarty_tpl->getVariable('year')->value;?>
</title>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />

        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('this')->value->baseUrl();?>
/css/layout.css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('this')->value->baseUrl();?>
/css/style.css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('this')->value->baseUrl();?>
/css/print.css" media="print" />
        <!--[if IE]>
            <link href="<?php echo $_smarty_tpl->getVariable('this')->value->baseUrl();?>
/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if lt IE 7]>
            <link href="<?php echo $_smarty_tpl->getVariable('this')->value->baseUrl();?>
/css/ie6.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->
        <script src="<?php echo $_smarty_tpl->getVariable('this')->value->baseUrl();?>
/lib/modernizr-2.0.6.min.js"></script>
    </head>
    <body>
        <div id="container">
            <header>
                <hgroup>
                    <h1>PHPConf Taiwan <?php echo $_smarty_tpl->getVariable('year')->value;?>
</h1>
                    <h2>台灣 PHP </h2>
                </hgroup>

            </header>
            <nav>
                <ul>
                    <li><a href="#">報名</a></li>
                    <li><a href="#">議程</a></li>
                    <li><a href="#">地點</a></li>
                    <li><a href="#">關於 PHPConf Taiwan</a></li>
                </ul>
            </nav>
            <?php echo $_smarty_tpl->getVariable('this')->value->layout()->content;?>

            <aside>
                <section></section>
                <section></section>
                <section></section>
                <section></section>
                <section></section>
            </aside>
            <footer>
                <p class="copyright">&copy;<?php echo $_smarty_tpl->getVariable('year')->value;?>
 PHPConf.TW</p>
            </footer>
        </div> <!--! end of #container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
