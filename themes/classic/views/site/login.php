<?php
$this->pageTitle = Yii::app()->name . ' - Вход';
?>

<div id="content" class="login">

    <h1><img src="<?=Yii::app()->baseUrl?>/img/icons/lock-closed.png" alt="" />Электронный архив</h1>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
    ?>

    <?php //вывод ошибок ?>
    <?php echo $form->errorSummary($model, '', '<a href="#" class="close"></a>', array('class' => 'notif error')); ?>
    

    <div class="input placeholder">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
    </div>

    <div class="input placeholder">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>            
    </div>

    <div class="checkbox">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="submit">
        <?php echo CHtml::submitButton('Войти'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
