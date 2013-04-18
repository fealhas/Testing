<?php
/*
 @author DrunkNinja
*/
class ViewCatAction extends StdAction
{
    public function run()
    {
        if (($cat_id = Yii::app()->request->getParam('cat_id'))=== null)
        {
            throw new CHttpException(404, Yii::t('base', 'The specified record cannot be found.'));
        }
        
        $first_id = $this->model()->getFirstId($cat_id);
        
        $isCat = Yii::app()->request->getParam('isCat');
        if (Yii::app()->request->getParam('isCat')==='false'){
            if ($first_id){
                $model = $this->getModel($first_id);
                $amount = $model->getTotalCount($model->categ_id);
                echo json_encode(array('rec'=>$model->attributes,
                                       'options'=>array(
                                                     'amount'=>$amount
                                                     )));
            }
            else
                echo false;
        }
        else
        {
            $cat = DocTree::model()->findByPk($cat_id);
            echo json_encode($cat->attributes);

        }
    }
}
?>
