<?php

class TestController extends Controller {

    public function actionIndex() {

        $requirements = array(
            array(
                Yii::t('yii', 'PHP version'),
                true,
                version_compare(PHP_VERSION, "5.1.0", ">="),
                '<a href="http://www.yiiframework.com" target="_blank">Yii Framework</a>',
                Yii::t('yii', 'PHP 5.1.0 or higher is required.')),           
            array(
                Yii::t('yii', 'Reflection extension'),
                true,
                class_exists('Reflection', false),
                '<a href="http://www.yiiframework.com" target="_blank">Yii Framework</a>',
                ''),
            array(
                Yii::t('yii', 'PCRE extension'),
                true,
                extension_loaded("pcre"),
                '<a href="http://www.yiiframework.com" target="_blank">Yii Framework</a>',
                ''),
            array(
                Yii::t('yii', 'SPL extension'),
                true,
                extension_loaded("SPL"),
                '<a href="http://www.yiiframework.com" target="_blank">Yii Framework</a>',
                ''),
            array(
                Yii::t('yii', 'DOM extension'),
                false,
                class_exists("DOMDocument", false),
                '<a href="http://www.yiiframework.com/doc/api/CHtmlPurifier" target="_blank">CHtmlPurifier</a>, <a href="http://www.yiiframework.com/doc/api/CWsdlGenerator" target="_blank">CWsdlGenerator</a>',
                ''),
            array(
                Yii::t('yii', 'PDO extension'),
                false,
                extension_loaded('pdo'),
                Yii::t('yii', 'All <a href="http://www.yiiframework.com/doc/api/#system.db" target="_blank">DB-related classes</a>'),
                ''),
            array(
                Yii::t('yii', 'PDO SQLite extension'),
                false,
                extension_loaded('pdo_sqlite'),
                Yii::t('yii', 'All <a href="http://www.yiiframework.com/doc/api/#system.db" target="_blank">DB-related classes</a>'),
                Yii::t('yii', 'This is required if you are using SQLite database.')),
            array(
                Yii::t('yii', 'PDO MySQL extension'),
                false,
                extension_loaded('pdo_mysql'),
                Yii::t('yii', 'All <a href="http://www.yiiframework.com/doc/api/#system.db" target="_blank">DB-related classes</a>'),
                Yii::t('yii', 'This is required if you are using MySQL database.')),
            array(
                Yii::t('yii', 'PDO PostgreSQL extension'),
                false,
                extension_loaded('pdo_pgsql'),
                Yii::t('yii', 'All <a href="http://www.yiiframework.com/doc/api/#system.db">DB-related classes</a>'),
                Yii::t('yii', 'This is required if you are using PostgreSQL database.')),
            array(
                Yii::t('yii', 'Memcache extension'),
                false,
                extension_loaded("memcache") || extension_loaded("memcached"),
                '<a href="http://www.yiiframework.com/doc/api/CMemCache" target="_blank">CMemCache</a>',
                extension_loaded("memcached") ? t('yii', 'To use memcached set <a href="http://www.yiiframework.com/doc/api/CMemCache#useMemcached-detail" target="_blank">CMemCache::useMemcached</a> to <code>true</code>.') : ''),
            array(
                Yii::t('yii', 'APC extension'),
                false,
                extension_loaded("apc"),
                '<a href="http://www.yiiframework.com/doc/api/CApcCache" target="_blank">CApcCache</a>',
                ''),
            array(
                Yii::t('yii', 'Mcrypt extension'),
                false,
                extension_loaded("mcrypt"),
                '<a href="http://www.yiiframework.com/doc/api/CSecurityManager" target="_blank">CSecurityManager</a>',
                Yii::t('yii', 'This is required by encrypt and decrypt methods.')),
            array(
                Yii::t('yii', 'SOAP extension'),
                false,
                extension_loaded("soap"),
                '<a href="http://www.yiiframework.com/doc/api/CWebService" target="_blank">CWebService</a>, <a href="http://www.yiiframework.com/doc/api/CWebServiceAction" target="_blank">CWebServiceAction</a>',
                ''),
            array(
                Yii::t('yii', 'GD extension with<br />FreeType support'),
                false,
                ($message = $this->checkGD()) === '',
                //extension_loaded('gd'),
                '<a href="http://www.yiiframework.com/doc/api/CCaptchaAction" target="_blank">CCaptchaAction</a>',
                $message),
        );

        $result = 1;  // 1: all pass, 0: fail, -1: pass with warnings

        foreach ($requirements as $i => $requirement) {
            if ($requirement[1] && !$requirement[2])
                $result = 0;
            else if ($result > 0 && !$requirement[1] && !$requirement[2])
                $result = -1;
            if ($requirement[4] === '')
                $requirements[$i][4] = '&nbsp;';
        }

        $this->render('index', array(
            'requirements' => $requirements,
            'result' => $result,
            'serverInfo' => $this->getServerInfo()));
    }

    function checkServerVar() {
        $vars = array('HTTP_HOST', 'SERVER_NAME', 'SERVER_PORT', 'SCRIPT_NAME', 'SCRIPT_FILENAME', 'PHP_SELF', 'HTTP_ACCEPT', 'HTTP_USER_AGENT');
        $missing = array();
        foreach ($vars as $var) {
            if (!isset($_SERVER[$var]))
                $missing[] = $var;
        }
        if (!empty($missing))
            return Yii::t('yii', '$_SERVER does not have {vars}.', array('{vars}' => implode(', ', $missing)));

        if (realpath($_SERVER["SCRIPT_FILENAME"]) !== realpath(__FILE__))
            return Yii::t('yii', '$_SERVER["SCRIPT_FILENAME"] must be the same as the entry script file path.');

        if (!isset($_SERVER["REQUEST_URI"]) && isset($_SERVER["QUERY_STRING"]))
            return Yii::t('yii', 'Either $_SERVER["REQUEST_URI"] or $_SERVER["QUERY_STRING"] must exist.');

        if (!isset($_SERVER["PATH_INFO"]) && strpos($_SERVER["PHP_SELF"], $_SERVER["SCRIPT_NAME"]) !== 0)
            return Yii::t('yii', 'Unable to determine URL path info. Please make sure $_SERVER["PATH_INFO"] (or $_SERVER["PHP_SELF"] and $_SERVER["SCRIPT_NAME"]) contains proper value.');

        return '';
    }

    function checkGD() {
        if (extension_loaded('gd')) {
            $gdinfo = gd_info();
            if ($gdinfo['FreeType Support'])
                return '';
            return Yii::t('yii', 'GD installed<br />FreeType support not installed');
        }
        return Yii::t('yii', 'GD not installed');
    }

    function getPreferredLanguage() {
        return Yii::app()->language;
    }

    function getServerInfo() {
        $info = array();
        $info[] = isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '';
        $info[] = '<a href="http://www.yiiframework.com/" target="_blank">Yii Framework</a>/' . Yii::getVersion();
        $info[] = @strftime('%Y-%m-%d %H:%M', time());

        return implode(' ', $info);
    }

// Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}