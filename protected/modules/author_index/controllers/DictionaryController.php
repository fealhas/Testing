<?php
class DictionaryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout=	'//layouts/author_index_dict';
	public $dictCtrlViewPath = 'application.modules.author_index.views.dictionary';
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
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Dictionary;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dictionary']))
		{
			$model->attributes=$_POST['Dictionary'];
			if (isset($_POST['Dictionary']['values']))
				$model->values = serialize($_POST['Dictionary']['values']);
			if($model->save()){
				if (!empty($model->values))
					$model->updateCache($model->element, $_POST['Dictionary']['values']);
				$this->renderPartial('treeView',array(
								'model'=>$model
								));
			}
		}
		else
		{
			$this->renderPartial('view',array(
				'model'=>$model,
			));	
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($key)
	{
		$model=$this->loadModelByKey($key);
		if (is_null($model))
		{
			$model = new Dictionary();
		}
		
		if(isset($_POST['Dictionary']))
		{
			$model->attributes=$_POST['Dictionary'];
			if (isset($_POST['Dictionary']['values'])){
				//if (!empty($model->values)){
					$model->values = serialize($_POST['Dictionary']['values']);
				//}
			}
			else $model->values = serialize(array());

			if($model->save()){
				//if (!empty($model->values))
					$model->updateCache($model->element, $_POST['Dictionary']['values']);
			}
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($key)
	{
		$this->loadModel($id)->delete();
		
		$model = new Dictionary();
		$this->renderPartial('treeView', array('model'=>$model));
	}

	public function actionIndex($id=null)
	{
		if (is_null($id)){
			$id = Dictionary::model()->find()->id;
			//$id=1;
		}
		
		$model = $this->loadModel($id);
		
		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	public function actionView($key){
		
		$model = $this->loadModelByKey($key);
		
		if (is_null($model))
		{
			$model = new Dictionary();
			
		}
		
		$this->renderPartial('view', array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Dictionary::model()->findByPk($id);
		
		if (!is_array($model->values)){
			$model->values=unserialize($model->values);
		}
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModelByKey($key)
	{
		$model = Dictionary::model()->findByAttributes(
				array('element'=>$key
				));
		
		if (isset ($model->values)){
			if (!is_array($model->values) && !empty($model->values)){
				$model->values=unserialize($model->values);
			}
			else 
				$model->values = '';
		}

		return $model;
	}
	
	public function actionGetDict ($element)
	{
		if (Yii::app()->request->isAjaxRequest)
		{
			echo Dictionary::model()->getDictByElem ($element);
			
		}
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dictionary-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>