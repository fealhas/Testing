<?php
/*
 @author DrunkNinja
*/
class DeleteAction extends StdAction
{
    public function run()
    {
        if (($id=Yii::app()->request->getParam('id')) !== null){
            $model = $this->getModel($id);
            $cat_id = $model->categ_id;
            $model->delete();
            
            $nextId = $this->model()->getNextId($id, $cat_id);
            $prevId = $this->model()->getPrevId($id, $cat_id);
            
            if ($nextId===null)
                if ($prevId===null)
                    $model = null;
                else
                    $model = $this->getModel($prevId);
            else
                $model = $this->getModel($nextId);
            
            if (!is_null($model))
            {
                $recData = $model->attributes;
                $ajaxMsgType= false;
                $ajaxMsg = null;
                $amount = $model->getTotalCount($model->categ_id);
            }
            else
            {
                $recData = null;
                $ajaxMsgType = 'error';
                $ajaxMsg= 'rec_not_found';
                $amount = null;
            }
            
            echo json_encode(array('rec'=>$recData,
                       'options'=>array(
                                            'amount'=>$amount,
                                            'ajax_message_type'=>$ajaxMsgType,
                                            'ajax_message'=>$ajaxMsg,
                                        ),
                       ));
        }
    }
}
?>