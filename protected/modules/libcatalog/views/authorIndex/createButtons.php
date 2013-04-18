<div class='row buttons' id='toolbar'>
<?php
$base_path = $this->getModule()->baseScriptUrl;
echo CHtml::imageButton("$base_path/img/icons/actions/save.png", array(
                                    "onClick"=>"createRecord(); return false;",
                                    'class'=>'action_button'
		       ));
?>
</div>