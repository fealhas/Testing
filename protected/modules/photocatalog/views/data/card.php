<?php
header('Content-Disposition: attachment;Filename=card.doc');
header('Content-type: application/vnd.ms-word');
?>
<html>
<head>
	<title></title>
</head>
<body>
	Рубрика/подрубрика :<br>
	<?=$model->rubric?><br>
	Описание ед. хр. (Дата, место, автор, индекс, вид основы и т.д.) :<br>
	<?=$model->type?><br>
	Аннотация :<br>
	<?=$model->text?><br>
	Примечание :<br>
	<?=$model->footnote?><br>
	Фонд :<br>
	<?=$model->fund?><br>
	Опись :<br>
	<?=$model->inventory?><br>
	Дело :<br>
	<?=$model->case?><br>
	Том :<br>
	<?=$model->tom?><br>
	№ ед.хр. (Л.л.):<br>
	<?=$model->sheet?><br>
	Крайние даты::<br>	
	c <?=$model->year1?> по <?=$model->year2?><br>
</body>
</html>
<?php

?>