<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Электронный архив',
    'theme' => 'classic',
    'language' => 'ru',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.components.SDynaTree.*',
	'application.modules.author_index.components.EJuiCombobox.EJuiComboBox',
        'application.modules.author_index.components.SDateWideEditor.SDateWideEditor',
	'application.modules.syscatalog.components.EJuiCombobox.EJuiComboBox',
        'application.modules.syscatalog.components.SDateWideEditor.SDateWideEditor',
	'application.modules.libcatalog.components.EJuiCombobox.EJuiComboBox',
        'application.modules.libcatalog.components.SDateWideEditor.SDateWideEditor'
	
        
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool		
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '192.168.0.100', '192.168.0.103',  '::1'),
        ),
        'rbam' => array(
            'development' => true,
            'initialise' => false,
            'userClass' => 'User',
            'applicationLayout' => '//layouts/rbam',
        ),
	'author_index'=>array(
            'development' =>true,
        ),
        'syscatalog'=>array(
            'development' =>true,
        ),
	'libcatalog'=>array(
            'development' =>true,
        ),
        'SDynaTreeEditor'=>array(),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName'=>false,
            'rules' => array(                
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'class'=>'CDbConnection',
            'connectionString'=>'pgsql:host=localhost;port=5432;dbname=elecarch_common',
            'username'=>'postgres',
            'password'=>'passwordroot',
            //'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
            //'tablePrefix' => 'ea__',
            'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
        'db_syscatalog' => array(
            'class'=>'CDbConnection',
            'connectionString'=>'pgsql:host=localhost;port=5432;dbname=catalog',
            'username'=>'postgres',
            'password'=>'passwordroot',
            //'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
            //'tablePrefix' => 'ea__',
            'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
	'db_author_index' => array(
            'connectionString' => 'pgsql:host=localhost;port=5432;dbname=elecarch',
            'username'         => 'postgres',
            'password'         => 'passwordroot',
            'class'            => 'CDbConnection',
	    'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
        'db_libcatalog' => array(
            'connectionString' => 'pgsql:host=localhost;port=5432;dbname=libcatalog',
            'username'         => 'postgres',
            'password'         => 'passwordroot',
            'class'            => 'CDbConnection',
	    'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
        'cache'=>array(
            'class'=>'system.caching.CDbCache',
            'cacheTableName' => 'cache',
            'autoCreateCacheTable' => true,
            //'connectionID' => 'db',
        ), 
        // uncomment the following to use a MySQL database
          //'db'=>array(
          //'connectionString' => 'mysql:host=localhost;dbname=testdrive',
          //'emulatePrepare' => true,
          //'username' => 'root',
          //'password' => '',
          //'charset' => 'utf8',
          //),
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            // таблицы должны быть с префиксом
            'assignmentTable' => '{{authassignment}}',
            'itemChildTable' => '{{authitemchild}}',
            'itemTable' => '{{authitem}}',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log'=>array(
                'class'=>'CLogRouter',
                'enabled'=>YII_DEBUG,
                'routes'=>array(
                        #...
                        array(
                                'class'=>'CFileLogRoute',
                                'levels'=>'error,trace,info,warning',
                                'categories'=>'system.db.*',
                                'logFile'=>'sql.log',

                        ),
//                        array(
//                                'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//                                'ipFilters'=>array('127.0.0.1',$_SERVER['REMOTE_ADDR']),
//                        ),
                ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
