
<div id='results'>
  <?php 
$fileName = 'Опись газетного фонда';//.Date("d.m.y, H:m:s");
header('Content-Disposition: attachment;Filename='.$fileName.'.doc');
header('Content-type: application/vnd.ms-word');
?>
<html>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<body>
<?php
echo CHtml::hiddenField('srch_total', $dataProvider->totalItemCount);
$models = $dataProvider->getData();
if (!empty($models)){
    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'enablePagination'=>false,
    'enableSorting'=>false,
    'summaryText'=>false,
    'selectableRows'=>0,
    'columns'=>array(
     'file_number',
     'masthead',
     'date_year3',
     'publish_date',
     'newspaper_number',
     'place_of_public',
     'footnote'
    ),
    'rowCssClass'=>array('record')
    ));
}
else echo "
<span style='font-size: 1em'>Записей с такими параметрами не найдено.
Пожалуйста измените параметры и повторите поиск.</span>
";
?>
</div>
</body>
</html>
