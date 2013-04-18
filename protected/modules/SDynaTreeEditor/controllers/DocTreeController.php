<?php
class DocTreeController extends Controller
{
    public $layout = "//layouts/top";
    
    public function actionIndex ()
    {
        $model = new DocTree();
        $roles = $this->getAllRoles();
        $this->render('index', array(
            'model'=>$model,
            'roles'=>$roles,
            ));
    }
    
//    public function actionViewNode ($id)
//    {
//        if (Yii::app()->request->isAjaxRequest){
//            if ($id!=-1)
//            {
//                $model=$this->loadModel($id);
//                $this->renderPartial('_editForm',array(
//                            'model'=>$model,
//                    ));
//            } else
//                {
//                    $model = new DocTree();
//                    $this->renderPartial('_createForm',array(
//                                'model'=>$model,
//                        ));
//                }
//	}
//    }
    
    public function actionViewNode ($id)
    {
        $model=$this->loadModel($id);
        echo json_encode(array(
                                'node'=>$model===null ? null :$model->attributes,
                                'options'=>null,
                ));
    }
    
    public function actionUpdateNode($id)
    {
            $model=$this->loadModel($id);
            if(isset($_POST['DocTree']))
            {
                    $model->attributes=$_POST['DocTree'];
                    $roles = $this->getAllRoles();
                    
                    if($model->save()){
                        echo json_encode(array(
                            'node'=>$model->attributes,
                            'options'=>null,
                            ));
                    }
            }
    }
    
    public function loadModel($id)
    {
        $model=DocTree::model()->findByPk($id);
        if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
    
    public function actionSaveTree ()
    {
        if (isset($_POST['RemovedNodes']))
        {
            DocTree::model()->removeNodes($_POST['RemovedNodes']);
        }
        if (isset($_POST['DocTree']))
        {
            DocTree::model()->treeSearch($_POST['DocTree']);
        }
    }
    
    public function actionCreateNode ()
    {
        $model = new DocTree();
        
        if(isset($_POST['DocTree']))
        {
                $model->attributes=$_POST['DocTree'];
                
                if($model->save()){
//                        $this->renderPartial('_editForm',array(
//                                'model'=>$model,
//                                        ));
                        echo $model->id;
                        Yii::app()->end();
                }
        }
    }
    
    public function actionRemoveNode ()
    {
        if (isset($_POST['DocTree']))
        {
            $id = $_POST['DocTree']['id'];
            $model = $this->loadModel($id);
            $model->delete();
        }
    }
    
    public function getAllRoles ()
    {
        $dataProvider = new RAuthItemDataProvider('roles', array(
                'type'=>CAuthItem::TYPE_ROLE,
        ));
        
        return $dataProvider->getData();
    }
    
    public function actionSetModule ()
    {
        if (($curModule=Yii::app()->request->getParam('curModule'))!==null){
            Yii::app()->user->setState('curModule',$curModule);
            //echo 'Ok';
        }
    }
}
?>