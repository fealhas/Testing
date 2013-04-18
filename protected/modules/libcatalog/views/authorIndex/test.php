<?php
            $dict_obj = new Dictionary();

            $model = new AuthorIndex;
            $dict = $dict_obj->getAllDictionaries();
            
            $this->widget('ext.EJuiComboBox.EJuiComboBox', array(
                    'model'=>$model,
                    'attribute'=>'fund_name',
                    'data'=>$dict['fund_name'],
                    'htmlOptions'=>array(
                                    'width' => 30,
                                    'id'=>'ai_fund_name',
                                    'allowText'=>false,
                                    )
                    ));
?>
