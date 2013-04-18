<div align='center'>
<?php
$basePath = $this->getModule()->baseScriptUrl; //path to module assets folder
        echo CHtml::link(CHtml::image("$basePath/img/icons/actions/word.png", 'Опись'), 
                array('data/doc'),
                array('target'=>'_blank',
		      'title' => 'Сохранить в Word',
              	      'id' => 'word',
                      'onClick'=>'doc(this, "Книга Учета", "#log_result");'
                    ));
        ?>
<div id='log_result' style="width: 400px">
<?php
echo CHtml::hiddenField('srch_total', $dataProvider->totalItemCount);
$models = $dataProvider->getData();
if (!empty($models)){
    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'summaryText'=>false,
    //'enableSorting'=>true,
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
    'id',    
    'lastname',
    'first_second_name',
    'all_dates',
	'width'=>550,
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
</div>
