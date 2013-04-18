<div id='results'>

<script>

function scrollToElement(theElement) {
theElement = document.getElementById(theElement);

    var selectedPosX = 0;
    var selectedPosY = 0;

    while (theElement != null) {
        selectedPosX += theElement.offsetLeft;
        selectedPosY += theElement.offsetTop;
        theElement = theElement.offsetParent;
    }

var theElem = document.getElementById('search_result');
	if(selectedPosY-$("#search_result").scrollTop()>100&&selectedPosY-$("#search_result").scrollTop()<200) return;
	$("#search_result").scrollTop(selectedPosY-200);
return;
}
var arrows = function (e){
     switch (e.keyCode) { 
      case 40: // down
    var lengthR = document.getElementById('srch_rslt_tbl').tBodies[0].rows.length-1;
    if ($('tr#curRow').index() != lengthR ) {
        $('tr#curRow').closest("tr").next().attr('id','curRowTemp');
    $('tr#curRow').each(function(){
        $(this).removeAttr('id');
        });
        $('tr#curRowTemp').attr('id','curRow');
    scrollToElement('curRow');
    }
    return false;
    break;
      case 38: // up
    if ($('tr#curRow').index() != 0){
        $('tr#curRow').closest("tr").prev().attr('id','curRowTemp');
    $('tr#curRow').each(function(){
        $(this).removeAttr('id');
    });
        $('tr#curRowTemp').attr('id','curRow');
    scrollToElement('curRow');
    }
    return false;
    break;
      case 13: // enter 
    var theElem = document.getElementById('curRow');
        var id = $(theElem).children().first().text();
    var cat_id = $(theElem).children().last().text();
    viewRecord(id);
    $("#auth_index").click();
    var tree = $('#doctree').dynatree("getTree");
    tree.activateKey(cat_id);
    return false;
    break;
}
}
var select = function(e) {
    $('tr#curRow').each(function(){
        $(this).removeAttr('id');
    });
    $( e.target ).closest("tr").attr('id','curRow');
  }
$("#search_res").click(function(){
  $( document ).bind("click", select);
  $( document ).bind("keydown", arrows);
});
$("#search_par").click(function(){
  $( document ).unbind("click", select);
  $( document ).unbind("keydown", arrows);
});
$("#dic_constr").click(function(){
  $( document ).unbind("click", select);
  $( document ).unbind("keydown", arrows);
});
$("#auth_index").click(function(){
  $( document ).unbind("click", select);
  $( document ).unbind("keydown", arrows);
});
$("#rep").click(function(){
  $( document ).unbind("click", select);
  $( document ).unbind("keydown", arrows);
});

</script>
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
        array(
            'name'=>'id',
            'type'=>'raw',
            'visible'=>true,
            'value'=>'$data->id',
            'htmlOptions'=>array('style'=>'display: none'),
            'headerHtmlOptions'=>array('style'=>'display: none; padding-left: 10px;'),
        ),
    'masthead',
    'date_year3',
    'footnote',
    ),
    'rowCssClass'=>array('record'),
    ));
}
else echo "
<strong>Записей с такими параметрами не найдено.
Пожалуйста измените параметры и повторите поиск.</strong>
";
?>
</div>
