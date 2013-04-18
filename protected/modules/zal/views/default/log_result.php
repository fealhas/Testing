
<div align='center' class="content" id='logzal_result' style='display: block; overflow-y:scroll'>
<?php
$basePath = $this->getModule()->baseScriptUrl; //path to module assets folder
echo CHtml::imageButton("$basePath/img/icons/actions/word.png", array(
            "onClick" => "docLog();",
            'class' => 'action_button editor_button',
            'title' => 'Сохранить в Word',
	    'id' => 'word',
        ));
        ?>
<div id='log_result' align='center'>
<center>
<table style="width:500px">
<tr><td style='text-align:center'>n/n</td><td style='text-align:center'>Дата посещения</td><td style='text-align:center'>Ф.И.О.</td></tr>
<tr><td style='text-align:center'>1</td><td style='text-align:center'>2</td><td style='text-align:center'>3</td></tr>
<?php
$i=1;
foreach ($dataProvider as $key=>$value){
    echo "<tr><td style='text-align:center'>".$i++."</td><td style='text-align:center'>".$value->visit_date."</td><td style='width:250px'>".$value->user->lastname." ".$value->user->first_second_name."</td></tr>"; 
}
?>
</table>
</center>
</div>
</div>
