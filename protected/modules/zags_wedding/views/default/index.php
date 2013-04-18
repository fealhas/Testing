<?php
if (Yii::app()->user->checkAccess('explorer') && !(Yii::app()->user->getIsSuperuser()))
            {
                Yii::app()->request->redirect(Yii::app()->homeUrl);
            }
?>
<div class="bloc abs">
    <div class="title">
            ЗАГС Бракосочетание
            <div class='tabs'>
            <a href="#author_index" id='auth_index'>ЗАГС Бракосочетание</a>
	    <a href="#search_params" id='search_par'>Параметры поиска</a>
	    <a href="#search_result" id='search_res'>Результат поиска</a>
	    <a href="#dictionary_constructor" id='dic_constr'>Конструктор словарей</a>
	    
            </div>
    </div>
    <div class="content" id='author_index'>
	<?php
	$id = Data::model()->getLastId();
	$model = Data::model()->findByPk($id);
	
	$this->renderPartial('application.modules.zags_wedding.views.authorIndex.index', array(
			     'model'=>$model,
			     ));
	?>
    </div>
        <div class="content" id='search_params'>
	<?php
	$model = new Data();
	$this->renderPartial('application.modules.zags_wedding.views.authorIndex.search',
			     array(
				   'model'=>$model
				  )
			     );
	?>
    </div>
    <div class="content" id='search_result'>
	<div id='results'>
		<strong>Записей с такими параметрами не найдено.
		Пожалуйста измените параметры и повторите поиск.</strong>
	</div>
    </div>
    <div class="content" id='dictionary_constructor'>
	<?php
	$model = Dictionary::model()->find();
	if (!is_null($model))
	{
		$id = $model->id;
		$model = Dictionary::model()->findByPk($id);
		$model->values = unserialize($model->values);
	}
	else $model = null;
	$this->renderPartial('application.modules.zags_wedding.views.dictionary.index',
			     array('model'=>$model));
	?>
    </div>
</div>
