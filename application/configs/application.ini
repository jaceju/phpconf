[production]
phpSettings[date.timezone] = "Asia/Taipei"
phpSettings.display_startup_errors = 0
phpSettings.display_errors = 0
includePaths.library = APPLICATION_PATH "/../library"
bootstrap.path = APPLICATION_PATH "/Bootstrap.php"
bootstrap.class = "Bootstrap"

appnamespace = "Phpconf_"

Autoloadernamespaces[] = "Phpconf_"

; Front Controller
resources.frontController.controllerDirectory = APPLICATION_PATH "/controllers"
resources.frontController.params.displayExceptions = 0
resources.frontController.actionHelperPaths.Phpconf_Controller_Action_Helper_ = "Phpconf/Controller/Action/Helper"
resources.frontController.plugins.auth.class = "Phpconf_Controller_Plugin_Auth"
resources.frontController.plugins.conference.class = "Phpconf_Controller_Plugin_Conference"
resources.frontController.plugins.mobile.class = "Phpconf_Controller_Plugin_Mobile"

; For Smarty
pluginPaths.Phpconf_Application_Resource_ = "Phpconf/Application/Resource"
resources.view.engine                 = "smarty"
resources.view.params.compile_dir     = APPLICATION_PATH "/temp/compiled"
resources.view.params.left_delimiter  = "<%"
resources.view.params.right_delimiter = "%>"
resources.view.params.auto_literal    = false
resources.view.doctype                = "XHTML1_TRANSITIONAL"

; For Layout
resources.layout.layoutPath = APPLICATION_PATH "/layouts/scripts/"

; For Database
resources.db.adapter = "Pdo_Mysql"
resources.db.params.host = "127.0.0.1"
resources.db.params.username = "username"
resources.db.params.password = "password"
resources.db.params.dbname = "phpconf"
resources.db.params.charset = "utf8"

; Router
resources.router.routes.year.type = "Zend_Controller_Router_Route"
resources.router.routes.year.route = ":year/:action"
resources.router.routes.year.defaults.controller = "index"
resources.router.routes.year.defaults.action = "index"
resources.router.routes.year.reqs.year = "\d+"

resources.router.routes.admin.type = "Zend_Controller_Router_Route"
resources.router.routes.admin.route = "admin/:admin/:action/*"
resources.router.routes.admin.defaults.controller = "admin"
resources.router.routes.admin.defaults.action = "index"
resources.router.routes.admin.reqs.admin = "\w+"

[staging : production]

[testing : production]
phpSettings.display_startup_errors = 1
phpSettings.display_errors = 1

[development : production]
phpSettings.display_startup_errors = 1
phpSettings.display_errors = 1
resources.frontController.params.displayExceptions = 1
