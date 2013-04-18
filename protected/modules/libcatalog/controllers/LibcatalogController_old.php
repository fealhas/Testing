<?php

class LibcatalogController extends StdController
{
	public $layout='//layouts/author_index_aindex';	

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($cat_id=null)
	{
		$model = new AuthorIndex();
		
		if(isset($_POST['AuthorIndex']))
		{
			$model->attributes = $_POST['AuthorIndex'];

			//$model->date_start = date("m/d/y");
			//$model->date_finish = date("m/d/y");
			
			$model->categ_id=$cat_id;
			
			if($model->save()){
				$this->renderPartial('view',array(
					'model'=>$model,
					 ));
				Yii::app()->end();
			}
		}
		else{
		$this->renderPartial('create',array(
			'model'=>$model,
			));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $this->redirect(array('update','id'=>AuthorIndex::model()->getLastId()));
	}
}