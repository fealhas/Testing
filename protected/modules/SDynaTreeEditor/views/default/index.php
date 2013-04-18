<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>

<div class='form' onsubmit='return false;'>
    <?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'author-index-form',
	'enableAjaxValidation'=>false,
	));
    
    $editor = new TreeEditor();
    $childrens = $editor->loadTree();
    $editor->makeJsonFile(Yii::getPathOfAlias('application.data').'/test.json', $childrens);
    $form->widget('SDynaTree', array('childrens'=>$childrens));
    
    echo CHtml::submitButton('testa',array(
        'class'=>'button',
        ));
    
    
    $this->endWidget();
    ?>
</div>