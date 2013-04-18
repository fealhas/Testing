<?php

class syscatalogController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/author_index_aindex';
	public $dictCtrlViewPath = 'application.modules.syscatalog.views.dictionary';	

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
				'actions'=>array('index','view','prevRec','nextRec', 'search', 
                                    'viewCat', 'updateTree', 'lastPrevRec', 'lastNextRec', 'test'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	
	public function actionUpdateTree()
	{
	if (Yii::app()->request->isAjaxRequest){
		$this->renderPartial('tree');
		Yii::app()->end();
	}
	}
	
	public function actionView($id)
	{
	if (Yii::app()->request->isAjaxRequest){
	    $model=$this->loadModel($id);
            echo json_encode($model->attributes);
//            $this->renderPartial('view',array(
//			'model'=>$model,
//		));
	}
	}
	
	public function actionViewCat($cat_id)
	{
	    if (Yii::app()->request->isAjaxRequest){
		$last_id = syscatalog::model()->getLastId($cat_id);
		//var_dump($cat_id);
                //Yii::app()->end();
                $cs = Yii::app()->getClientScript();
                
		if ($last_id){
			$model = $this->loadModel($last_id);
                       
			$output = $this->renderPartial('view',array(
					'model'=>$model,
			));
                        
		}
		else{
			$model = new syscatalog();
			$output = $this->renderPartial('create',array(
					'model'=>$model,
			));
		}
                
                //$cs->render(&$output);
		
	}
	}
	
	public function actionPrevRec ($id, $cat_id=1){
		if (Yii::app()->request->isAjaxRequest){
		    $id = syscatalog::model()->getPrevId($id, $cat_id);
		    $model=$this->loadModel($id);
                    if (!is_null($model))
                        echo json_encode($model->attributes);
                    Yii::app()->end();
//		    $this->renderPartial('view',array(
//				'model'=>$model,
//			));
		}
	}
	
	public function actionNextRec ($id, $cat_id=1){
		if (Yii::app()->request->isAjaxRequest){
			$id =  syscatalog::model()->getNextId($id, $cat_id);
			$model=$this->loadModel($id);
                        if (!is_null($model))
                            echo json_encode($model->attributes);
                        Yii::app()->end();
		}
	}
	
	public function actionLastNextRec ($cat_id)
	{
		if (Yii::app()->request->isAjaxRequest){
			$id =  syscatalog::model()->getLastNextId($cat_id);
			$model=$this->loadModel($id);
                        if (!is_null($model))
                            echo json_encode($model->attributes);
//			$this->renderPartial('view',array(
//				'model'=>$model,
//			));
		}
	}
	
	public function actionLastPrevRec ($cat_id)
	{
		if (Yii::app()->request->isAjaxRequest){
			$id =  syscatalog::model()->getLastPrevId($cat_id);
			$model=$this->loadModel($id);
                        if (!is_null($model))
                            echo json_encode($model->attributes);
//			$this->renderPartial('view',array(
//				'model'=>$model,
//			));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($cat_id=null)
	{
		$model = new syscatalog();
		//$this->performAjaxValidation($model);
		
		if(isset($_POST['syscatalog']))
		{
			$model->attributes = $_POST['syscatalog'];

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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		//$this->performAjaxValidation($model);
		if(isset($_POST['syscatalog']))
		{
			$model->attributes=$_POST['syscatalog'];
			if($model->save()){
                                echo json_encode($model->attributes);
//				$this->renderPartial('view',array(
//					'model'=>$model,
//						));
				Yii::app()->end();
			}
		}
	}
        

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
			$cat_id = $model->categ_id;
			$model->delete();
                        unset($model);
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])){
                            
                            $nextId = syscatalog::model()->getNextId ($id, $cat_id);
			    $prevId = syscatalog::model()->getPrevId($id, $cat_id);
			    
                            if (!$nextId)
                                $nextId = $prevId;
                            
                            //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : 
                            //    array('view','id'=>$nextId));
//			    	$this->renderPartial('view',array(
//				'model'=>$this->loadModel($nextId),
//				'nextId'=>$nextId,
//				'prevId'=>$prevId
//							  ));
                            $model = $this->loadModel($nextId);
                            
                            if (!is_null($model))
                                echo json_encode($model->attributes);
                        }
				
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $this->redirect(array('update','id'=>syscatalog::model()->getLastId()));
	}
	
//	public function actionSearch(){
//		if (Yii::app()->request->isAjaxRequest){
//			if(isset($_POST['data']))
//			{
//				$search_params = $_POST['data']['search_params'];
//				
//				$cats_id = null;
//				
//				if (isset($_POST['data']['cats_id']))
//					$cats_id = $_POST['data']['cats_id'];
//				
//				$model = new syscatalog();
//				$model->attributes=$search_params;
//				$rules = $search_params['rules']; //логическое выражение
//				
//				$dataProvider = $model->search($cats_id, $rules);
//				
//				$this->renderPartial('search_result',array(
//					'dataProvider'=>$dataProvider,
//					'setPagination'=>false,
//						));
//				Yii::app()->end();
//			}
//		}
//	}
        
        public function actionSearch(){
		if (Yii::app()->request->isAjaxRequest){
			if(isset($_POST['data']))
			{
                                $_POST['data']['search_params']['categ_id']=$_POST['data']['cats_id'];
				$search_params = $_POST['data']['search_params'];

                                $srch = new Search ('syscatalog');
                                $srch->params=$search_params;;
                                $srch->concatOp = $_POST['concatOp'];
                                
                                $result = $srch->simpleFind($search_params);
                                $model = new syscatalog();
                                
				$dataProv = new CActiveDataProvider($model, array(
                                            'data'=>$result,
                                    ));
                                
                                $this->renderPartial('search_result',array(
					'dataProvider'=>$dataProv,
					'setPagination'=>false,
						));
				
			}
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=syscatalog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		//if(isset($_POST['ajax']) && $_POST['ajax']==='author-index-form')
		//{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		//}
	}
        
        public function actionTest ()
        {
            $this->layout = '//layouts/plain';
            $this->render('test');
            $this->layout = '//layouts/author_index_aindex';
        }
}