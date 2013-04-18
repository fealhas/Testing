<div id='results'>
<?php
echo CHtml::hiddenField('srch_total', $dataProvider->totalItemCount);
$models = $dataProvider->getData();
if (!empty($models)){
    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    //'enableSorting'=>true,
    'summaryText'=>false,
    'ajaxUpdate'=>true,
    'enablePagination'=>false,
//             'pager' => array(
//                'class' => 'CLinkPager',
//                'cssFile' => false,
//                'header' => false,
//                'firstPageLabel' => 'First',
//                'prevPageLabel' => 'Previous',
//                'nextPageLabel' => 'Next',
//                'lastPageLabel' => 'Last',
//                'pageSize' => 3,
//    ),
    'selectableRows'=>0,
    'columns'=>array(
        array(
            'name'=>'id',
            'type'=>'raw',
            'visible'=>true,
            'value'=>'$data->id',
        ),
      'name_public',
      'author',
      'annotation',
      'yaer_name_public',
      'marks',
      'info',
    ),
    'rowCssClass'=>array('record')
    ));
}
else echo "
<strong>Записей с такими параметрами не найдено.
Пожалуйста измените параметры и повторите поиск.</strong>
";
?>
</div>
