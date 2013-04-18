<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.
                                                   '/js/script_authorIndex.js',
                                                   CClientScript::POS_HEAD);
?>
<?php $this->beginContent('//layouts/top'); ?>
    
    <div class="content">
        <h1><img src="<?= Yii::app()->baseUrl ?>/img/icons/users.png" alt="Пользователи" />Именной указатель</h1> 
<div class="bloc abs">
    <div class="title">
	    Именной указатель
	    <div class='tabs'>
	    <a href="#author_index">Именной указатель</a>
	    <a href="#search_params">Параметры поиска</a>
	    <a href="#search_result">Результаты поиска</a>
	    <a href="#dictionary_constructor">Конструктор словарей</a>
	    </div>
    </div>
    <div class="content" id='author_index'>
	<?php
	echo $content;
	?>
    </div>
    <div class="content" id='dictionary_constructor'>
	<?php
	$id = Dictionary::model()->find()->id;
	$model = Dictionary::model()->findByPk($id);
	$model->values = unserialize($model->values);
	$this->renderPartial('application.modules.author_index.views.dictionary.admin',
			     array('model'=>$model));
	?>
    </div>
    <div class="content" id='search_params'>
						   
    </div>
    <div class="content" id='search_result'>
    </div>
</div>
    </div>

<?php $this->endContent(); ?>