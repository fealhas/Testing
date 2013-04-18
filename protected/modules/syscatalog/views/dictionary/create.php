<?php
$this->breadcrumbs=array(
	'Dictionaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dictionary', 'url'=>array('index')),
	array('label'=>'Manage Dictionary', 'url'=>array('admin')),
);
?>

<h1>Создание словаря</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>