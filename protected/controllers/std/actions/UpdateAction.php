<?php
/*
 @author DrunkNinja
*/
class UpdateAction extends StdAction
{
    public function run()
    {
        $modelName = $this->getModelName();
        $model = $this->getModel();
        $isNew =  $model->isNewRecord ? true : false;

        if(isset($_POST[$modelName]))
        {
            $model->attributes=$_POST[$modelName];
            if($model->save()){
                $ajaxMsgType = 'success';
                $ajaxMsg = 'Запись сохранена';
                $recData = $model->attributes;
                $amount = $model->getTotalCount($model->categ_id);
            }
            else
            {
                $recData = null;
				var_dump($model->errors);
                $ajaxMsgType = 'Ошибка доступа к серверу';
                $ajaxMsg = 'not_saved';
                $amount = null;
            }
            
            echo json_encode(array('rec'=>$recData,
               'options'=>array(
                                'amount'=>$amount,
                                'ajax_message_type'=>$ajaxMsgType,
                                'ajax_message'=>$ajaxMsg,
                               )
               ));  
        }
    }
}
?>
