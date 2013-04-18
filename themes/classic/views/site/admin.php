<?php
if (!(Yii::app()->user->getIsSuperuser()))
            {
                Yii::app()->request->redirect(Yii::app()->homeUrl);
            }
?>
<?php $this->renderPartial('webroot.themes.classic.views.system.moduleDialog')?>

<h1><?=CHtml::image(Yii::app()->baseUrl.'/img/icons/dashboard.png')?>Администрирование</h1>

<div class="bloc">
    <div class="title">
        Управление ГИС &laquo;Электронный Архив&raquo;
    </div>
    <div class="content">
        <?php
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/users.png', 'Редактор деревьев').'Редактор деревьев', 
                    array('/SDynaTreeEditor'),
                    array('class'=>'shortcut',
                        'id'=>'docTreeEditorShortcut',
            ));

            echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/users.png', 'Пользователи').'Пользователи',
                    array('/user/admin'),
                    array('class'=>'shortcut',
            ));

             echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/users.png', 'Ролевая политика').'Ролевая политика', 
                array('/rights'),
                array('class'=>'shortcut',
            ));
        ?>
        <div class="cb"></div>
    </div>
</div>