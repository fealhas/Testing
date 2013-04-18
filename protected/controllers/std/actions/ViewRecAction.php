<?php
/*
 @author DrunkNinja
*/
class ViewRecAction extends StdAction
{
    public function run()
    {
        if (($rec_id = Yii::app()->request->getParam('id'))!==null)
        {
            $model = null;
            $id = null;
            $ajaxMsgType = null;
            $ajaxMsg = null;
            
            if (($cat_id=Yii::app()->request->getParam('cat_id'))!==null)
            {
                $action = Yii::app()->request->getParam('action');
                
                switch ($action)
                {
                    case 'last':
                        $id = $this->model()->getLastNextId($cat_id);
                        break;
                    case 'prev':
                        $ajaxMsg = 'Это первая запись базы данных!';
                        $id = $this->model()->getPrevId($rec_id, $cat_id);
                        break;
                    case 'first':
                        $id =  $this->model()->getLastPrevId($cat_id);
                        break;
                    case 'next':
                        $ajaxMsg = 'Это последняя запись базы данных!';
                        $id = $this->model()->getNextId($rec_id, $cat_id);
                        break;
                }
            }
            else
            {
                $id = $rec_id;
            }
            
            if (!is_null($id))
                $model = $this->getModel($id);
        
            if (!is_null($model))
            {
                $recData = $model->attributes;
                $ajaxMsgType= false;
                $amount = $model->getTotalCount($model->categ_id);
            }
            else
            {
                $recData = null;
                $ajaxMsgType = is_null($ajaxMsgType) ? 'info' : $ajaxMsgType;
                $ajaxMsg= is_null($ajaxMsg) ? 'rec_not_found' : $ajaxMsg;
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
        else
            throw new CHttpException(404, Yii::t('base', 'The specified record cannot be found.'));
    }
}
?>