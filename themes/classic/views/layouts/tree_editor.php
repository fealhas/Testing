<?php $this->beginContent('//layouts/full'); ?>
<h1><img src="<?= Yii::app()->baseUrl ?>/img/icons/users.png" alt="Пользователи" />Редактор деревьев</h1> 

<div class="bloc">
    <div class="title">
        Редактор деревьев
    </div>
    <div class="content">
        <?php echo $content; ?>
        <div class="cb"></div>
    </div>
</div>
<?php $this->endContent(); ?>