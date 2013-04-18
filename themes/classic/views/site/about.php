<?php
$this->pageTitle = Yii::app()->name . ' - О программе';
$this->breadcrumbs = array(
    'О программе',
);
?>

<h1><img src="<?= Yii::app()->baseUrl ?>/img/icons/button-white-info.png" alt="О&nbsp;программе &laquo;Электронный архив&raquo;" /> О&nbsp;программе &laquo;Электронный архив&raquo;</h1>

<p>This is a "static" page. You may change the content of this page
    by updating the file <tt><?php echo __FILE__; ?></tt>.</p>
<div class="bloc">
    <div class="title">
        О программе
    </div>
    <div class="content">

        <div class="cb"></div>
    </div>
</div>

<div class="bloc">
    <div class="title">
        О разработчиках
    </div>
    <div class="content">

        <div class="cb"></div>
    </div>
</div>

<div class="bloc">
    <div class="title">
        О системе
    </div>
    <div class="content">
        <?function getServerInfo() {
            $info = array();
            $info[] = isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '';
            $info[] = '<a href="http://www.yiiframework.com/" target="_blank">Yii Framework</a>/' . Yii::getVersion();
            $info[] = @strftime('%Y-%m-%d %H:%M', time());

            return implode(' ', $info);
        }
        ?>        
        <ul>
            <li>Имя хоста (IP адрес): <?=  php_uname('n')?> (<?=  strip_tags($_SERVER['SERVER_ADDR'])?>)</li>            
            <li>Доступ к серверу: <?=  strip_tags($_SERVER['SERVER_SIGNATURE'])?></li>
            <li>Информация о сервере: <?= getServerInfo() ?><br/></li>            
            <li>Тип базовой операционной системы: <?=  php_uname('s')?></li>
            <li>Версия ядра: <?=  php_uname('r')?></li>
            <li>Информация о PHP: <?=  phpversion()?></li>
        </ul>
        <?=CHtml::link('Проверка на соответствие требованиям Yii', array('test/'))?>        
        <div class="cb"></div>
    </div>
</div>