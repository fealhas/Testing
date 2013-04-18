<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.
                                                   '/js/script_authorIndex.js',
                                                   CClientScript::POS_HEAD);
?>
<?php $this->beginContent('//layouts/full'); ?>
    
    <div class="content">
        <h1><img src="<?= Yii::app()->baseUrl ?>/img/icons/users.png" alt="Пользователи" />Именной указатель</h1> 
<div class="bloc">
    <div class="title">
            Именной указатель
            <div class='tabs'>
            <a href="#dictionary_constructor">Конструктор словарей</a> 
            <a href="#author_index">Именной указатель</a>
            </div>
    </div>
    <div class="content" id='author_index'>
	<?php
        $id = AuthorIndex::model()->getLastId();
	$model = AuthorIndex::model()->findByPk($id);
	
	$this->renderPartial('application.modules.author_index.views.authorIndex.view', array(
			     'model'=>$model));
	?>
    </div>
    <div class="content" id='dictionary_constructor'>
	<?php
        echo $content;
	?>
    </div>
</div>
    </div>
    
<?php $this->endContent(); ?>