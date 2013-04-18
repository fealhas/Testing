<div id="ai_viewer" style='float: left'>
<div class="row buttons">
<?php
$base_path = $this->getModule()->baseScriptUrl;

echo CHtml::imageButton("$base_path/img/icons/actions/save.png", array(
                                    "onClick"=>"createRecord(); return false;",
                                    'class'=>'action_button'
		       ));
?>
</div>
<?php
$this->renderPartial('application.modules.author_index.views.authorIndex._form',
                                    array('model'=>$model,
                                          ));
?>
</div>