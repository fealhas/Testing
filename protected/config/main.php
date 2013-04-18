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
        'application.modules.libcatalog.components.SDateWideEditor.SDateWideEditor',
        'application.modules.user.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.models.*',
        'application.modules.rights.components.*',
        'application.modules.rights.components.dataproviders.*',
	'application.modules.syscatalog.models.*'
	
        
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool		
        /*'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '192.168.0.100', '192.168.0.103',  '::1'),
        ),*/
        'user',
        'rights'=>array(
            'install'=>false,
            //'superuserName' => 'Admin',
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
        'photocatalog'=>array(
            'development' =>true,
        ),
       'newspaperFund'=>array(
            'development' =>true,
        ),
	'zags_death'=>array(
            'development' =>true,
        ),
       'zags_wedding'=>array(
            'development' =>true,
        ),
       'zags_birth'=>array(
            'development' =>true,
        ),
       'zal'=>array(
            'development' =>true,
        ),
        'SDynaTreeEditor'=>array(
	    'development' =>true,
	),
    ),
    // application components
    'components' => array(
        'user' => array(
           'class' => 'RWebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
            'connectionID'=>'db',
            'defaultRoles' => array('Guest'),
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
            'connectionString'=>'pgsql:host=white.isarh.local;port=5432;dbname=elecarch_common_test',
            'username'=>'postgres',
            'password'=>'gugaoo2007',
            //'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
            'enableProfiling'=>true,
            'enableParamLogging'=>true,
            'tablePrefix'=>'',
            'schemaCachingDuration'=>1000,
        ),
        'db_photocatalog' => array(
            'class'=>'CDbConnection',
            'connectionString'=>'pgsql:host=white.isarh.local;port=5432;dbname=photocatalog_test',
            'username'=>'postgres',
            'password'=>'gugaoo2007',
            //'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
            'enableProfiling'=>true,
            'enableParamLogging'=>true,
            'tablePrefix'=>'',
            'schemaCachingDuration'=>1000,
        ),
        'db_syscatalog' => array(
            'class'=>'CDbConnection',
            'connectionString'=>'pgsql:host=white.isarh.local;port=5432;dbname=catalog_arch',
            'username'=>'postgres',
            'password'=>'gugaoo2007',
            //'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
            //'tablePrefix' => 'ea__',
            'enableProfiling'=>true,
            'enableParamLogging'=>true,
            'schemaCachingDuration'=>1000,
        ),
	   'db_author_index' => array(
            'connectionString' => 'pgsql:host=white.isarh.local;port=5432;dbname=aindex_test',
            'username'         => 'postgres',
            'password'         => 'gugaoo2007',
            'class'            => 'CDbConnection',
	       'enableProfiling'=>true,
            'enableParamLogging'=>true,
            'schemaCachingDuration'=>1000,
        ),
        'db_libcatalog' => array(
            'connectionString' => 'pgsql:host=white.isarh.local;port=5432;dbname=libcatalog_test',
            'username'         => 'postgres',
            'password'         => 'gugaoo2007',
            'class'            => 'CDbConnection',
	       'enableProfiling'=>true,
            'enableParamLogging'=>true,
            'schemaCachingDuration'=>1000,
        ),
        'db_newspaperfund' => array(
            'connectionString' => 'pgsql:host=white.isarh.local;port=5432;dbname=newspaper_fund_test',
            'username'         => 'postgres',
            'password'         => 'gugaoo2007',
            'class'            => 'CDbConnection',
            'enableProfiling'=>true,
            'enableParamLogging'=>true,
            'schemaCachingDuration'=>1000,
        ),
	'db_zags_birth' => array(
            //'connectionString' => 'pgsql:host=10.2.55.15;port=5432;dbname=newspaper_fund_test',
        'connectionString' => 'pgsql:host=white.isarh.local;port=5432;dbname=zags_birth',
            'username'         => 'postgres',
            'password'         => 'gugaoo2007',
            'class'            => 'CDbConnection',
        'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
        'db_zags_wedding' => array(
            //'connectionString' => 'pgsql:host=10.2.55.15;port=5432;dbname=newspaper_fund_test',
        'connectionString' => 'pgsql:host=white.isarh.local;port=5432;dbname=zags_wedding',
            'username'         => 'postgres',
            'password'         => 'gugaoo2007',
            'class'            => 'CDbConnection',
        'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
        'db_zags_death' => array(
            //'connectionString' => 'pgsql:host=10.2.55.15;port=5432;dbname=newspaper_fund_test',
        'connectionString' => 'pgsql:host=white.isarh.local;port=5432;dbname=zags_death',
            'username'         => 'postgres',
            'password'         => 'gugaoo2007',
            'class'            => 'CDbConnection',
        'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
	'db_zal' => array(
            //'connectionString' => 'pgsql:host=10.2.55.15;port=5432;dbname=newspaper_fund_test',
        'connectionString' => 'pgsql:host=white.isarh.local;port=5432;dbname=zal',
            'username'         => 'postgres',
            'password'         => 'gugaoo2007',
            'class'            => 'CDbConnection',
        'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
        'cache'=>array(
            //'class'=>'system.caching.CDbCache',
            //'cacheTableName' => 'cache',
            //'autoCreateCacheTable' => true,
            'class' => 'CMemCache',
            'servers'=>array(
                array(
                    'host'=>'localhost',
                    'port'=>11211,
                ),
            ),
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
//        'authManager' => array(
//            'class' => 'CDbAuthManager',
//            'connectionID' => 'db',
//            // таблицы должны быть с префиксом
//            'assignmentTable' => '{{authassignment}}',
//            'itemChildTable' => '{{authitemchild}}',
//            'itemTable' => '{{authitem}}',
//        ),
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
                       array(
                               'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                               'ipFilters'=>array('127.0.0.1','127.0.1.1'),
                       ),
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
