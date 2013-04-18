<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.
                                                   '/js/script_authorIndex.js',
                                                   CClientScript::POS_HEAD);
?>
<?php $this->beginContent('//layouts/full'); ?>
    
    <div class="content">
        <?php echo $content; ?>
    </div>
    
<?php $this->endContent(); ?>