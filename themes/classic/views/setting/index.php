<?php if (!(Yii::app()->user->getIsSuperuser()))
            {
                Yii::app()->request->redirect(Yii::app()->homeUrl);
            }
?>
<h1><?= CHtml::image(Yii::app()->baseUrl . '/img/icons/cog.png') ?> Настройки</h1>

<div class="bloc">
    <div class="title">
        Инструменты
    </div>
    <div class="content">
        <?=CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/user.png', 'Пользователи').'Пользователи', array('/user'),array('class'=>'shortcut'))?>
        <?=CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/users.png', 'Менеджер RBAC').'Менеджер RBAC', array('/rbam'),array('class'=>'shortcut'))?>
        <?=CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/briefcase.png', 'Модули').'Модули', array('/module'),array('class'=>'shortcut'))?>        
        <div class="cb"></div>
    </div>    
</div>