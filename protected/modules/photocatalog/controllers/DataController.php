<?php
class DataController extends StdController
{
	public $layout='//layouts/author_index_aindex';
	
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionCard($id){
		$this->renderPartial('card', array('model'=>Data::model()->findByPk($id)));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}