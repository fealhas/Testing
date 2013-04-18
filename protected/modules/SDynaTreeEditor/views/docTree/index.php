<?php
if (!(Yii::app()->user->getIsSuperuser()))
            {
                Yii::app()->request->redirect(Yii::app()->homeUrl);
            }
?>
<div class="bloc" style='margin-top: 50px'>
    <div class="title">
        Редактор дерева
    </div>
    <div class="content">
        <?php $this->renderPartial('_contextMenu'); ?>
        <div class='dtree' style="float: left; width: 40%; margin-right: 20px; min-height: 500px">
            <?php
                $base_path = $this->getModule()->baseScriptUrl;
                echo CHtml::imageButton("$base_path/img/icons/actions/save.png",
                                array(
                                    'onClick'=>'saveTree(); return false;',
                                    'id'=>'save_tree_btn'
                                ));
            ?>
            <div id="docTree">
            <?php $this->renderPartial('_tree'); ?>
            </div>
        </div>
        
        <div id="editForm">
        <?php $this->renderPartial('_editForm', array(
            'model'=>$model,
            'roles'=>$roles,
            ));
        ?>
        </div>
    </div>
</div>
