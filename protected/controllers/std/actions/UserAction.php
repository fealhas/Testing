<?php
/*
 @author DrunkNinja
*/
class UpdateAction extends StdAction
{
    public function run()
    {
        $modelName = 'Users';
        $model = 'Users';
        $isNew =  $model->isNewRecord ? true : false;

        if(isset($_POST[$modelName]))
        {
            $model->attributes=$_POST[$modelName];
            if($Data->save()){
                $recData = $model->attributes;
                $amount = $model->getTotalCount($model->categ_id);
            }
            else
            {
                $recData = null;
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