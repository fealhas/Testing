<?php $this->beginContent('//layouts/full'); ?>
<h1><img src="<?= Yii::app()->baseUrl ?>/img/icons/users.png" alt="Пользователи" /> Менеджер RBAC</h1> 

<div class="bloc">
    <div class="title">
        Менеджер
    </div>
    <div class="content">
        <?php echo $content; ?>
        <div class="cb"></div>
    </div>
</div>
<?php $this->endContent(); ?>