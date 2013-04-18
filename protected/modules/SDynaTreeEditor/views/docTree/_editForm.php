<div class="form" id='treeEditorForm'>
    <?php
        echo CHtml::hiddenField ('cat_id', $model->id   ,array('id'=>'cur_cat_id'));
    ?>
    <div class="row buttons">
        <div id='updateToolbar'>
        <?php
            $base_path = $this->getModule()->baseScriptUrl;
            echo CHtml::imageButton("$base_path/img/icons/actions/save.png",
                               array(
                                'onClick'=>"updateActiveNode($model->id); return false;",
                                'id'=>'updateBtn',
                                     )
                               );
            echo CHtml::imageButton("$base_path/img/icons/actions/refresh.png",
                   array(
                    'onClick'=>"viewNode($model->id);",
                         )
                   );
        ?>
        </div>
        <div id='createToolbar' class='hidden'>
        <?php
            echo CHtml::imageButton("$base_path/img/icons/actions/save.png",
                               array(
                                'onClick'=>"createNewNode(); return false;",
                                'id'=>'createBtn',
                                     )
                               );
        ?>
        </div>
    </div>
    
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'author-index-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
	));
    ?>
    
    <div class="row input medium">
	    <?php echo CHtml::activeLabelEx($model, 'caption');?>
	    <?php echo $form->textField($model,'caption') ?>
	    <?php echo $form->error($model,'caption'); ?>
    </div>
    
    <div class="row input textarea">
            <?php echo CHtml::activeLabelEx($model, 'info');?>
            <?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>900));?>
            <?php echo $form->error($model,'info'); ?>
    </div>
    
    <div class="row input">
        <?php
            $roleData = null;
            if (is_array($roles))
            {
                foreach ($roles as $role)
                {
                    $roleData[$role->name] = $role->name;
                }
            }
            
            if (!is_null($roleData))
            {
                echo $form->labelEx($model, 'role');
                echo $form->dropDownList($model, 'role',$roleData);
            }
        ?>
    </div>
    
    <?php $this->endWidget(); ?>
</div>